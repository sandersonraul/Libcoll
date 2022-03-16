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

Route::get('/', 'IndexController@index')->name('home');
Route::get('/catalog', 'IndexController@show')->name('catalog');

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


Route::get('/new/lending','LendingsController@create')->name('new_lending');
Route::post('/new/lending','LendingsController@store')->name('save_lending');
Route::get('/lendings/index','LendingsController@index')->name('lendings_index');
Route::get('/lendings/return/book{id}','LendingsController@returnBook')->name('return_book');


Route::get('/new/booking{id}','BookingsController@store')->name('save_booking');
Route::get('/bookings/index','BookingsController@index')->name('bookings_index');
