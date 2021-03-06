<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "wb" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','middleware'=>'auth'], function() {
     Route::get('work/edit', 'Admin\WorkController@edit');
     Route::get('work/create', 'Admin\WorkController@add');
     Route::post('work/create', 'Admin\WorkController@create');
     Route::post('work/edit', 'Admin\WorkController@update');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
