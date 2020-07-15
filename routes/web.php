<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => '/files'], function () {
    Route::get('/', 'FileController@index')
        ->name('files.index');

    Route::get('/{file}', 'FileController@show')
        ->name('files.download')
        ->where('file', '[0-9]+');

    Route::get('/upload', 'FileController@create')
        ->name('files.upload')
        ->middleware('auth');

    Route::post('/', 'FileController@store')
        ->name('files.store')
        ->middleware('auth');
});

Route::get('/profiles/{user:username}', 'ProfilesController@show')
    ->name('profiles.show');

//Route::get('/profiles/')
//    ->name('profiles.edit');

//Route::get('/vue', 'HomeController@test')
//    ->name('vue.test');
