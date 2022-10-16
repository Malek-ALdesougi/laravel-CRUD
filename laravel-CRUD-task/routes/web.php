<?php

use App\Http\Controllers\Books;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', [BooksController::class, 'index']);

// route to take the user data 
Route::post('/middel', [BooksController::class, 'create']);

Route::get('edit/{id}', [BooksController::class, 'post']);

Route::put('update/{id}', [BooksController::class, 'update']);

Route::delete('delete/{id}', [BooksController::class, 'delete']);

Route::get('book/search', [BooksController::class, 'search']);

Route::get('/addBook', function (){
    return view('addBook');
});
