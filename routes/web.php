<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/stories', 'StoriesController@index')->name('stories');
    Route::get('/stories/create', 'StoriesController@create')->name('stories.create');
    Route::get('/stories/{story}', 'StoriesController@show')->name('stories.show');
    Route::post('/stories/store', 'StoriesController@store')->name('stories.store');
    Route::get('/stories/{story}/edit', 'StoriesController@edit')->name('stories.edit');
    Route::put('/stories/{story}/update', 'StoriesController@update')->name('stories.update');
    
});
