<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use App\Models\Employee;
use App\Models\Departments;

class BooksManagementController extends Controller
{
    public function showMainMenu(Request $req)
    {
        //     $login_id = $req->login_id;
        //     $password = $req->password;

        // TODO
        // DBと接続してユーザ認証。社員IDと部署を取得
        // 全件レコードも取得
        $data = [
            'records' => Book::All()
        ];
        return view('booksmanagement.mainMenu', $data);
    }

    public function search(Request $req)
    {
    }

    // public function getIsbn(){
    //     return view('registration');
    // }

    public function postIsbn(Request $req){
        unset($req['_token']);
        $value = $req['show'];
        $books = array('isbn','book_name','series','publisher','pubdate','cover','author');
        
        $base_url = 'https://api.openbd.jp/v1/get?isbn=';

        $response = file_get_contents(
                    $base_url.$value
                    );
        $result = json_decode($response,true);
        $getdata = $result[0]["summary"];
            foreach($getdata as $key){
                $books = $key;
                print_r($books);
            }
            $data = [
                'isbn' => $req -> isbn,
                'title' => $req -> book_name,
                'author' => $req -> author,
                'publisher' => $req -> publisher,
                // 'isbn' => $req -> isbn,
                // 'title' => $req -> book_name,
                // 'author' => $req -> author,
                // 'publisher' => $req -> publisher,
                //'price' => $req -> price,
                //'num_of_books' => $req -> num_of_books
            ];
            return view('booksmanagement.registration',$data);
            
        // $result = json_decode($response,true);

        // $getdata = $result[0]["summary"];
        // foreach($getdata as $key => $value){
        //     if($key == 'isbn'){
        //         $savedata = \App\Book::firstOrNew(['isbn'=>$value]);

        //         if(isset($savedata->id)){
        //             $msg = '作成済みのデータがあります';
        //         }else{
        //             $msg = 'データを登録しました';
        //         }
        //     }else{
        //         $savedata -> $key = $value;
        //     }
        //     return view('registration',['msg' => $msg,'data' => $savedata]);
        // }
    }
    public function create()
    {
        return view('booksmanagement.registration');
    }
        
        //データ登録処理用アクションメソッドの定義
    public function store(Request $req)
    {
        $input = $req -> validate([
            //'book_name' => 'unique:books,NULL',
            'isbn' => 'unique:books,NULL'
        ]);
                

        $article = new Book(); //モデルのインスタンスを生成
        //フォームのデータをプロパティに代入
        $article -> isbn = $req -> isbn; //入力フォームからのデータ
        $article -> book_name = $req -> book_name;     //入力フォームからのデータ
        $article -> author = $req -> author; //入力フォームからのデータ
        $article -> publisher = $req -> publisher; //入力フォームからのデータ
        $article -> price = $req -> price; //入力フォームからのデータ
        $article -> num_of_books = $req -> num_of_books; //入力フォームからのデータ
        //テーブルにデータを保存するメソッドの実行
        $article -> save();
        //登録したデータをビューに渡し、表示する
        $data = [
            'isbn' => $req -> isbn,
            'book_name' => $req -> book_name,
            'author' => $req -> author,
            'publisher' => $req -> publisher,
            'price' => $req -> price,
            'num_of_books' => $req -> num_of_books
        ];
        return view('booksmanagement.registrationSuccess',$data);
    }

    public function erase(Request $req)
    {
		    //get通信の場合
        if($req -> isMethod('get')){
            return view(('booksmanagement.delete'));
        }else if($req -> isMethod('post')){
            $id=$req -> id;
            $data = [
		            //入力されたid値のデータを取得
                'record' => Book::find($id)
            ];
            return view('booksmanagement.delete',$data);
        }else{
            redirect('/');
        }
    }

    public function delete(Request $req)
    //データ削除用アクションメソッドの定義
    {
		    //削除対象のレコードをフォームからのid値を元にモデルに取り出す
        $books = Book::find($req -> isbn);
        //データを削除するメソッドを実行
        $books -> delete();
        $data = [
            'id' => $req -> id,
            'book_name' => $req -> book_name,
            'author' => $req -> author,
            'publisher' => $req -> publisher,
            'price' => $req -> price,
            'isbn' => $req -> isbn,
            'num_of_book' => $req -> num_of_book,
        ];
        return view('booksmanagement.delete',$data);
    }
}
