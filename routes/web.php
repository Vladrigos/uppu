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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'File', 'prefix' => 'files'], function(){
    Route::get('/', 'FileController@index')
            ->name('file.index');
    Route::get('upload', 'FileController@create')
            ->name('file.upload')
            ->middleware('auth');
    Route::post('/', 'FileController@store')
            ->name('file.store')
            ->middleware('auth');
});
