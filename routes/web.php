<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksManagementController;

Route::get('/', function () {
    return view('index');
});

Route::get('/booksmanagement/mainMenu', [BooksManagementController::class, 'showMainMenu']);
Route::post('/booksmanagement/registration', [BooksManagementController::class, 'postIsbn']);
Route::get('/booksmanagement/registration', [BooksManagementController::class, 'create']);
Route::get('/booksmanagement/registrationSuccess', [BooksManagementController::class, 'store']);
Route::post('/booksmanagement/deleteSuccess', [BooksManagementController::class, 'delete']);
Route::get('/booksmanagement/delete', [BooksManagementController::class, 'erase']);
Route::post('/booksmanagement/delete', [BooksManagementController::class, 'erase']);
