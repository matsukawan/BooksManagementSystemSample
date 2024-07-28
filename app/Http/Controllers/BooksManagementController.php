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
        $employee = Employee::where('emp_id', $login_id)->first();

        if (!isset($employee) || $password != $employee->password) {
            return back()->withErrors([
                'login_id' => 'ログイン情報が正しくありません。'
            ]);
        }

        $req->session()->put('emp_id', $employee->id); // ログインIDではなく社員ID
        $req->session()->put('emp_name', $employee->emp_name); //社員名
        $req->session()->put('dep_id', $employee->dep_id); // 部署ID

        // 社員IDと社員名、部署IDをshowMainMenuにリダイレクト
        return redirect()->action([BooksManagementController::class, 'showMainMenu']);
    }

    public function logout(Request $req)
    {
        $req->session()->flush();

        return view('booksmanagement.logout');
    }

    // メインメニュー表示
    public function showMainMenu(Request $req)
    {
        // booksテーブルのレコード全件、社員名、社員ID、部署IDを取得しメインメニューに遷移する
        $data = [
            // 全件取得、ペジネート
            'records' => Book::paginate(10),
            'emp_id' => $req->session()->get('emp_id',),
            'emp_name' => $req->session()->get('emp_name',),
            'dep_id' => $req->session()->get('dep_id',)
        ];

        return view('booksmanagement.mainMenu', $data);
    }

    // ISBN、書籍名、著者名で検索する
    public function showSearchResult(Request $req)
    {
        $key = $req->search_word;

        // ISBNが入力された場合、'-'を削除して検索する
        $isbn = str_replace('-', '', $key);
        $records = Book::where('isbn', $isbn)->get();
        if ($records->count() == 1) {
            $data = [
                'records' => $records,
                'emp_id' => $req->session()->get('emp_id',),
                'emp_name' => $req->session()->get('emp_name',),
                'dep_id' => $req->session()->get('dep_id',)
            ];
        } else {
            // ISBNの検索結果がなかった場合、書籍名か著者名で検索する
            // 条件に一致するIDを取得するサブクエリを作成
            $subQuery = Book::select('id')
                ->where('book_name', 'LIKE', "%$key%")
                ->orWhere('author', 'LIKE', "%$key%");

            // サブクエリで取得したIDを使ってメインクエリを実行する
            $records = Book::whereIn('id', $subQuery)->get();

            $data = [
                'records' => $records,
                'emp_id' => $req->session()->get('emp_id',),
                'emp_name' => $req->session()->get('emp_name',),
                'dep_id' => $req->session()->get('dep_id',)
            ];
        }

        return view('booksmanagement.searchResult', $data);
    }

    // 詳細表示処理
    public function showDetail(Request $req)
    {
        $book = Book::where('id', '=', $req->book_id)->first();
        // ペジネート
        $reviews = Review::where('book_id', $req->book_id)->paginate(10);
        $review_exist = $reviews->contains('emp_id', $req->session()->get('dep_id',));

        $data = [
            'book_id' => $book->id,
            'book_name' => $book->book_name,
            'author' => $book->author,
            'publisher' => $book->publisher,
            'price' => $book->price,
            'isbn' => $book->isbn,
            'num_of_books' => $book->num_of_books,
            'created_at' => date('Y年m月d日', strtotime($book->created_at)),
            'emp_id' => $req->session()->get('emp_id',),
            'emp_name' => $req->session()->get('emp_name',),
            'dep_id' => $req->session()->get('dep_id',),
            'reviews' => $reviews,
            'review_exist' => $review_exist
        ];

        return view('booksmanagement.detailView', $data);
    }
    public function reviewCreate(Request $req)
    {
        // $reviewCreate = Review::find($req -> emp_id);
        // print_r($reviewCreate);
        $data = [
            'book_id'   => $req -> book_id,
            'book_name' => $req -> book_name,
            'author'    => $req -> author,
            'emp_id'    => $req -> emp_id,
            'emp_name'  => $req -> emp_name
        ];
        
        return view('review.reviewCreate',$data);
    }

    public function reviewCreateSuccess(Request $req)
    {
        $review = new Review();
        $review->book_id = $req -> book_id;
        $review->emp_id  = $req -> emp_id;
        $review->comment = $req -> comment;
        $review->rating  = $req -> rating;

        $review->save();

        switch($review -> rating){
            case 1: $pointStar = '★☆☆☆☆'; break;
            case 2: $pointStar = '★★☆☆☆'; break;
            case 3: $pointStar = '★★★☆☆'; break;
            case 4: $pointStar = '★★★★☆'; break;
            case 5: $pointStar = '★★★★★'; break;
        };

        $data = [
            'book_name'  => $req -> book_name,
            'author'     => $req -> author,
            'emp_name'   => $req -> emp_name,
            'emp_id'     => $req -> emp_id,
            'comment'    => $req -> comment,
            'rating'     => $pointStar,
            'book_id'    => $req -> book_id,
            'created_at' => $req -> created_at,
        ];
        return view('review.reviewCreateSuccess', $data);
    }

    public function reviewUpdate(Request $req)
    {
        $data = [
            'records'   => Review::where('book_id','=',$req -> book_id)->where('emp_id','=',$req -> emp_id)->first(),
            'book_name' => $req -> book_name,
            'author'    => $req -> author,
            'emp_name'  => $req -> emp_name,
        ];

        return view('/review/reviewUpdate',$data);       
    }

    public function reviewUpdateSuccess(Request $req)
    {
        $review = Review::where('book_id','=',$req -> book_id)->where('emp_id','=',$req -> emp_id)->first();
        // print_r($review);
        // dd($review);
        $review -> rating  = $req -> rating;
        $review -> comment = $req -> comment;

        $review -> save();

        $data = [
            'records'   => Review::where('book_id','=',$req -> book_id)->where('emp_id','=',$req -> emp_id)->first(),
            'book_name' => $req -> book_name,
            'author'    => $req -> author,
            'emp_name'  => $req -> emp_name,
        ];
        return view('review.reviewupdateSuccess',$data);
    }

    public function postIsbn(Request $req)
    {
        //$isbn = str_replace('-', '', $req);
        unset($req['_token']);
        $value = $req['isbn'];

        $base_url = 'https://api.openbd.jp/v1/get?isbn=';

        $response = file_get_contents(
            $base_url . $value,
            false,
        );
        $result  = json_decode($response, true);
        $getdata = $result[0]["summary"];

        return view('booksmanagement.registration', ['getdata' => $getdata]);
    }

    public function create()
    {
        return view('booksmanagement.registration');
    }


    public function store(Request $req)
    {
        $input = $req -> validate([
            //'book_name' => 'unique:books,NULL',
            'isbn' => 'unique:books,NULL'
        ]);
    

        $article = new Book();

        $article -> isbn         = $req -> isbn;
        $article -> book_name    = $req -> book_name;
        $article -> author       = $req -> author;
        $article -> publisher    = $req -> publisher;
        $article -> price        = $req -> price;
        $article -> num_of_books = $req -> num_of_books;
        //テーブルにデータを保存するメソッドの実行
        $article->save();
        //登録したデータをビューに渡し、表示する
        $data = [
            'isbn'         => $req -> isbn,
            'book_name'    => $req -> book_name,
            'author'       => $req -> author,
            'publisher'    => $req -> publisher,
            'price'        => $req -> price,
            'num_of_books' => $req -> num_of_books
        ];
        return view('booksmanagement.registrationSuccess', $data);
    }

    public function erase(Request $req)
    {
        //get通信の場合
        if ($req->isMethod('get')) {
            return view(('booksmanagement.delete'));
        } else if ($req -> isMethod('post')) {
            $id = $req -> id;
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
        $books = Book::find($req -> id);
        //データを削除するメソッドを実行
        $books -> delete();
        $data = [
            'id'          => $req -> id,
            'book_name'   => $req -> book_name,
            'author'      => $req -> author,
            'publisher'   => $req -> publisher,
            'price'       => $req -> price,
            'isbn'        => $req -> isbn,
            'num_of_book' => $req -> num_of_book,
        ];
        return view('booksmanagement.deleteSuccess', $data);
    }
}
