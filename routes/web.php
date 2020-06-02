<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/posts/mypost','PostController@index')->name('post');

Route::get('{any}', 'AppController@index')
    ->where('any','.*')
    ->middleware('auth')
    ->name('home');

