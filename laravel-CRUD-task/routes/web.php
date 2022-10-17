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

//route to fetch all table rows and post them into the home page table
Route::get('/home', [BooksController::class, 'index']);

// route to take the book data 
Route::post('/middel', [BooksController::class, 'create']);

//rout to post the book details into the edit page
Route::get('edit/{id}', [BooksController::class, 'post']);

//route to update the book data
Route::put('update/{id}', [BooksController::class, 'update']);

//route to delete a book 
Route::delete('delete/{id}', [BooksController::class, 'delete']);

//route to search a book
Route::get('book/search', [BooksController::class, 'search']);

//author page 
Route::get('/author/{name}', [BooksController::class, 'author']);

//route to add a book 
Route::get('/addBook', function () {
    return view('addBook');
});
