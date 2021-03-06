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

Route::get('/books/create', 'BookController@create');
Route::post('/books', 'BookController@store');

# show the search form
Route::get('/books/search', 'BookController@search');
# Process the search form
Route::get('/books/search-process', 'BookController@searchProcess');

Route::get('/books/', 'BookController@index');

// {title} is basically acting as an argument
Route::get('/books/{title}', 'BookController@show');
/*
Route::get('/books/{title?}', function ($title) {
    return 'Results for book: '.$title;
});
*/


/**
 * Practice
 */
Route::any('/practice/{n?}', 'PracticeController@index');
# Example routes from the discussion of P3 development (Week 6, Part 8 video)
//Route::get('/', 'TriviaController@index');
//Route::get('/check-answer', 'TriviaController@checkAnswer');


Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    $debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});