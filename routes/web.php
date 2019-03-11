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

Route::view('/', 'welcome');
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/example', function () {
    return view('abc');
});

Route::get('/books/', 'BookController@index');

// {title} is basically acting as an argument
Route::get('/books/{title}', 'BookController@show');
/*
Route::get('/books/{title?}', function ($title) {
    return 'Results for book: '.$title;
});
*/