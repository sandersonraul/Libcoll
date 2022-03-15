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

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::get('/new/book','BooksController@create')->name('new_book');
Route::post('/new/book','BooksController@store')->name('save_book');
Route::get('/show/books','BooksController@showAll')->name('showAll');
Route::get('/show/book{id}','BooksController@show')->name('show_book');
Route::get('/delete/book{id}','BooksController@destroy')->name('destroy_book');
Route::get('/edit/book{id}','BooksController@edit')->name('edit_book');
Route::put('/update/book{id}','BooksController@update')->name('update_book');

Route::get('/new/user','UsersController@create')->name('new_user');
Route::post('/new/user','UsersController@store')->name('save_user');
Route::get('/show/user{id}','UsersController@show')->name('show_user');
Route::get('/edit/user{id}','UsersController@edit')->name('edit_user');
Route::put('/update/user{id}','UsersController@update')->name('update_user');
Route::get('/users/index','UsersController@showAll')->name('showAllUsers');


Route::get('/new/loan','LoansController@create')->name('new_loan');
Route::post('/new/loan','LoansController@store')->name('save_loan');
Route::get('/loans/index','LoansController@index')->name('loans_index');
Route::get('/loans/approve{id}','LoansController@approve')->name('approve');
Route::get('/loans/reject{id}','LoansController@reject')->name('reject');
Route::get('/loans/return/book{id}','LoansController@returnBook')->name('return_book');
