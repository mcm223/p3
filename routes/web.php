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

/*
Route::get('/', function () {
    return view('welcome');
});

*/

// New index route
Route::get('/', 'BookController@index');

// Process user input to fetch book
Route::get('/fetch-book', 'BookController@fetchBook');

// Show route
Route::get('/books/{title}', 'BookController@show');

// Practice route
Route::any('/practice/{n?}', 'PracticeController@index');
