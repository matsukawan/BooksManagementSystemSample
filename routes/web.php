<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksManagementController;

Route::get('/', function () {
    return view('/booksmanagement/mainMenu');
});

Route::get('/booksmanagement/mainMenu', [BooksManagementController::class, 'showMainMenu']);
Route::get('/booksmanagement/registration', [BooksManagementController::class, 'create']);
Route::post('/booksmanagement/registrationSuccess', [BooksManagementController::class, 'store']);
