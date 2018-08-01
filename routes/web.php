<?php

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

Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {
	// Route diisi disini...
	Route::resource('author', 'AuthorController');
	Route::resource('book', 'BookController');
});

Route::get('books/{book}/borrow', ['middleware' => ['auth', 'role:member'],'as' => 'pinjambuku','uses' => 'BookController@borrow'
]);

Route::put('books/{book}/return', ['middleware' => ['auth', 'role:member'],'as' => 'kembalikanbuku','uses' => 'BookController@returnBack'
]);
