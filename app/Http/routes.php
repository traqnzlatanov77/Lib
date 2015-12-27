<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/', 'HomeController');

//TODO: routes for laravel authentication
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::put('/books/{id}/edit', 'BooksController@edit');

Route::delete('/books/{id}', 'BooksController@destroy');

Route::get('/books/create', 'BooksController@store');

Route::put('/genres/{id}/edit', 'GenresController@edit');

Route::put('/authors/{id}/edit', 'AuthorsController@edit');

Route::resource('/user', 'UserController');

Route::resource('/books', 'BooksController');

Route::resource('/authors', 'AuthorsController');

Route::resource('/genres', 'GenresController');

