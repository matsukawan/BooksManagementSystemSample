<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksManagementController;

Route::get('/', function () {
    return view('index');
});

Route::post('/booksmanagement/login', [BooksManagementController::class, 'login']);
Route::get('/booksmanagement/showMainMenu', [BooksManagementController::class, 'showMainMenu']);
Route::get('/booksmanagement/mainMenu', [BooksManagementController::class, 'showMainMenu']);
Route::get('/booksmanagement/detailView', [BooksManagementController::class, 'showDetail']);
//登録処理
Route::post('/booksmanagement/registration', [BooksManagementController::class, 'postIsbn']);
Route::get('/booksmanagement/registration', [BooksManagementController::class, 'create']);
Route::post('/booksmanagement/registrationSuccess', [BooksManagementController::class, 'store']);
Route::post('/booksmanagement/deleteSuccess', [BooksManagementController::class, 'delete']);
//削除処理
Route::get('/booksmanagement/delete', [BooksManagementController::class, 'erase']);
Route::post('/booksmanagement/delete', [BooksManagementController::class, 'erase']);
//レビュー登録処理
Route::get('/booksmanagement/mainMenu', [BooksManagementController::class, 'showMainMenu']);
Route::get('/review/reviewCreate', [BooksManagementController::class, 'reviewCreate']);
Route::post('review/reviewCreate', [BooksManagementController::class, 'reviewUpdateSuccess']);
Route::get('review/reviewUpdateSuccess', [BooksManagementController::class, 'reviewUpdateSuccess']);
