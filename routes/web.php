<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksManagementController;

Route::get('/', function () {
    return view('index');
});

Route::post('/booksmanagement/login', [BooksManagementController::class, 'login']);
Route::get('/booksmanagement/showMainMenu', [BooksManagementController::class, 'showMainMenu']);
Route::get('/booksmanagement/searchResult', [BooksManagementController::class, 'showSearchResult']);
Route::get('/booksmanagement/logout', [BooksManagementController::class, 'logout']);
// 詳細表示
Route::get('/booksmanagement/detailView', [BooksManagementController::class, 'showDetail']);

//登録処理
Route::post('/booksmanagement/registration', [BooksManagementController::class, 'postIsbn']);
Route::get('/booksmanagement/registration', [BooksManagementController::class, 'create']);
Route::post('/booksmanagement/registrationSuccess', [BooksManagementController::class, 'store']);
//削除処理
Route::post('/booksmanagement/deleteSuccess', [BooksManagementController::class, 'delete']);
Route::get('/booksmanagement/delete', [BooksManagementController::class, 'erase']);
Route::post('/booksmanagement/delete', [BooksManagementController::class, 'erase']);


//レビュー登録処理
Route::get('/review/reviewCreate', [BooksManagementController::class, 'reviewCreate']);
Route::post('/review/reviewCreate', [BooksManagementController::class, 'reviewCreateSuccess']);
//Route::post('/review/reviewCreateSuccess', [BooksManagementController::class, 'reviewCreateSuccess']);
//Route::get('/review/reviewCreateSuccess', [BooksManagementController::class, 'reviewCreateSuccess']);
//レビュー更新処理
Route::get('/review/reviewUpdate',[BooksManagementController::class,'reviewUpdate']);
Route::post('/review/reviewUpdate',[BooksManagementController::class,'reviewUpdate']);
Route::post('/review/reviewUpdateSuccess',[BooksManagementController::class,'reviewUpdateSuccess']); 