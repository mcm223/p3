<?php

// Index route
Route::get('/', 'BookController@index');

// Process user input to fetch book
Route::get('/fetch-book', 'BookController@fetchBook');
