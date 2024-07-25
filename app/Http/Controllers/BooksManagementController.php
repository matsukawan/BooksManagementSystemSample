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

//     public function getIsbn(){
//         return view('registration');
//     }

//     public function postIsbn(Request $request){
//         unset($request['_token']);
//         $value = $request['isbn'];

//         $isbn_url = 'https://api.opendb.jp/v1/get?isbn=';

//         $response = file_get_contents(
//                     $base_url.$value
//                     );

//         $result = json_decode($response,true);

//         $getdata = $result[0]["summary"];
//         foreach($getdata as $key => $value){
//             if($key == 'isbn'){
//                 $savedata = \App\Book::firstOrNew(['isbn'=>$value]);

//                 if(isset($savedata->id)){
//                     $msg = '作成済みのデータがあります';
//                 }else{
//                     $msg = 'データを登録しました';
//                 }
//             }else{
//                 $savedata -> $key = $value;
//             }
//             return view('registration',['msg' => $msg,'data' => $savedata]);
//         }
//     }
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
}
