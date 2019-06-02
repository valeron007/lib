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

Route::get('/', function () {
    return view('index');
})->name('main');

Route::match(['GET', 'POST'], '/books', 'BookController@index');

Route::match(['GET', 'POST'], '/authors', 'AuthorController@index');

Route::match(['GET', 'POST'], '/authors/delete/{id}', 'AuthorController@destroy');

Route::match(['GET', 'POST'], '/authors/edit/{id}', 'AuthorController@edit');

Route::match(['GET', 'POST'], '/authors/create', 'AuthorController@create')->name('create');

Route::match(['GET', 'POST'], '/books/create', 'BookController@create');

Route::match(['GET', 'POST'], '/books/edit/{id}', 'BookController@edit');

Route::match(['GET', 'POST'], '/books/delete/{id}', 'BookController@destroy');

Route::match(['GET', 'POST'], '/book-authors/{id}/delete-author/{authors_id}', 'BookAuthorController@destroy');



