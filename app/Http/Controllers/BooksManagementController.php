<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use App\Models\Employee;
use App\Models\Departments;

class BooksManagementController extends Controller
{
    // ログイン認証
    public function login(Request $req)
    {
        $login_id = $req->login_id;
        $password = $req->password;
        $employee = Employee::where('emp_id', '=', $login_id)->first();

        if (!isset($employee) || $password != $employee->password) {
            return back()->withErrors([
                'login_id' => 'ログイン情報が正しくありません。'
            ]);
        }

        $emp_name = $employee->emp_name;
        $emp_id = $employee->id; // ログインIDではなく社員ID
        $dep_id = $employee->dep_id;

        $data = [
            'emp_id' => $emp_id, // ログインIDではなく社員ID
            'emp_name' => $emp_name,
            'dep_id' => $dep_id
        ];

        // 社員名と部署IDをshowMainMenuにリダイレクト
        return redirect()->action([BooksManagementController::class, 'showMainMenu'], $data);
    }

    //メインメニュー表示
    public function showMainMenu(Request $req)
    {
        // booksのレコードを全件取得し、社員名と部署IDと併せてメインメニューに遷移
        $data = [
            'records' => Book::All(),
            'emp_name' => $req->emp_name,
            'emp_id' => $req->emp_id,
            'dep_id' => $req->dep_id
        ];

        return view('booksmanagement.mainMenu', $data);
    }
    public function reviewCreate(Request $req)
    {
        $data = [
            'book_id' => $req -> book_id,
            'book_name' => $req -> book_name,
            'author' => $req -> author,
            'emp_id' => $req -> emp_id,
            'emp_name' => $req -> emp_name
        ];
        
        return view('review.reviewCreate',$data);
    }

    public function reviewStore(Request $req)
    {
        $review = new Review();
        $review->book_id = $req->book_id;
        $review->emp_id = $req->emp_id;
        $review->comment = $req->comment;
        $review->rating = $req->rating;

        $review->save();

        $data = [
            'book_name' => $req -> book_name,
            'author' => $req -> author,
            'emp_name' => $req -> emp_name,
            'emp_id' => $req->emp_id,
            'comment' => $req->comment,
            'rating' => $req->rating,
            'book_id' => $req->book_id,
            'created_at' => $req->created_at
        ];
        return view('review.reviewCreateSuccess', $data);
    }
    public function reviewCreateSuccess(Request $req)
    {
        //$review = new Review();
        //$book = new Book();
        //$emp = new Employee();

        //$book->book_name = $req->book_name;
        //$book->author = $req->author;



        //$review->rating = $req->rating;
        //$review->comment = $req->comment;

        //$emp->emp_name = $req->emp_name;

        //$review->save();
        // $review->save();
        $review = Review::where('created_at')->first();

        $data = [
            'book_name' => $req->book_name,
            'author' => $req->author,
            'rating' => $req->rating,
            'comment' => $req->comment,
            'created_at' => $review,
            'emp_name' => $req->emp_name
        ];

        return view('review.reviewCreateSuccess', $data);
    }

    //     return view('review.reviewUpdateSuccess');
    // }

    public function reviewUpdate(Request $req)
    {
        if($req -> isMethod('get')){ //メソッド(get/post)の種類を調べるメソッド
            return view('db.edit'); //get通信の場合、そのままビューを表示
        }else if($req -> isMethod('post')){
		        $id = $req -> id;
		        $data = [
            'record' => Article::find($id)
        ];
		        return view('db.edit',$data); //post通信の場合、データを指定してビューを表示
        }else{
            redirect('/');
        }
    }

    public function reviewUpdateSuccess(Request $req) //データ更新用アクションメソッドの定義
    {
		    //更新対象のレコードをフォームからid値を元にモデルに取り出す
        $article = Article::find($req -> id);
        //フォームのデータをモデルに代入(上書き)
        $article -> user_name = $req -> user_name;
        $article -> posted_item = $req -> posted_item;
        //モデルのデータをテーブルに保存(上書き)するメソッドを実行
        $article -> save();
        $data = [
            'id' => $req -> id,
            'user_name' => $req -> user_name,
            'posted_item' => $req -> posted_item
        ];
        return view('db.update',$data);
    }

    public function showDetail(Request $req)
    {
        $book = Book::where('id', '=', $req->book_id)->first();
        $reviews = Review::where('book_id', '=', $req->book_id)->get();
        $review_exist = $reviews->contains('emp_id', $req->emp_id);

        $data = [
            'book_id' => $book->id,
            'book_name' => $book->book_name,
            'author' => $book->author,
            'publisher' => $book->publisher,
            'price' => $book->price,
            'isbn' => $book->isbn,
            'num_of_books' => $book->num_of_books,
            'created_at' => $book->created_at,
            'emp_name' => $req->emp_name,
            'emp_id' => $req->emp_id,
            'dep_id' => $req->dep_id,
            'reviews' => $reviews,
            'review_exist' => $review_exist
        ];

        

        return view('booksmanagement.detailView', $data);
    }

    public function postIsbn(Request $req)
    {
        unset($req['_token']);
        $value = $req['isbn'];

        $base_url = 'https://api.openbd.jp/v1/get?isbn=';

        $response = file_get_contents(
            $base_url . $value,
            false,
        );
        $result = json_decode($response, true);
        $getdata = $result[0]["summary"];

        return view('booksmanagement.registration', ['getdata' => $getdata]);
    }

    public function create()
    {
        return view('booksmanagement.registration');
    }

    //データ登録処理用アクションメソッドの定義
    public function store(Request $req)
    {
        $input = $req->validate([
            //'book_name' => 'unique:books,NULL',
            'isbn' => 'unique:books,NULL'
        ]);


        $article = new Book(); //モデルのインスタンスを生成
        //フォームのデータをプロパティに代入
        $article->isbn = $req->isbn; //入力フォームからのデータ
        $article->book_name = $req->book_name;     //入力フォームからのデータ
        $article->author = $req->author; //入力フォームからのデータ
        $article->publisher = $req->publisher; //入力フォームからのデータ
        $article->price = $req->price; //入力フォームからのデータ
        $article->num_of_books = $req->num_of_books; //入力フォームからのデータ
        //テーブルにデータを保存するメソッドの実行
        $article->save();
        //登録したデータをビューに渡し、表示する
        $data = [
            'isbn' => $req->isbn,
            'book_name' => $req->book_name,
            'author' => $req->author,
            'publisher' => $req->publisher,
            'price' => $req->price,
            'num_of_books' => $req->num_of_books
        ];
        return view('booksmanagement.registrationSuccess', $data);
    }

    public function erase(Request $req)
    {
        //get通信の場合
        if ($req->isMethod('get')) {
            return view(('booksmanagement.delete'));
        } else if ($req->isMethod('post')) {
            $id = $req->id;
            $data = [
                //入力されたid値のデータを取得
                'record' => Book::find($id)
            ];
            return view('booksmanagement.delete', $data);
        } else {
            redirect('/');
        }
    }

    public function delete(Request $req)
    //データ削除用アクションメソッドの定義
    {
        //削除対象のレコードをフォームからのid値を元にモデルに取り出す
        $books = Book::find($req->id);
        //データを削除するメソッドを実行
        $books->delete();
        $data = [
            'id' => $req->id,
            'book_name' => $req->book_name,
            'author' => $req->author,
            'publisher' => $req->publisher,
            'price' => $req->price,
            'isbn' => $req->isbn,
            'num_of_book' => $req->num_of_book,
        ];
        return view('booksmanagement.deleteSuccess', $data);
    }
}
