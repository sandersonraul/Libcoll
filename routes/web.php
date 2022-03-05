<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/home', [HomeController::class, "index"]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/new/book','BooksController@create')->name('new_book');
Route::post('/new/book','BooksController@store')->name('save_book');
Route::get('/show/books','BooksController@show')->name('showAll');
Route::get('/delete/book{id}','BooksController@destroy')->name('destroy_book');
Route::get('/edit/book{id}','BooksController@edit')->name('edit_book');
Route::post('/edit/book{id}','BooksController@update')->name('update_book');

