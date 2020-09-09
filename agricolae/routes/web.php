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

Route::group(['middleware' => 'lang'], function () {
    
    Route::get('/', 'HomeController@index')->name("home.index");

    Route::get('/account/show', 'User\UserController@show')->name("user.show");

    Route::get('/account/edit', 'User\UserController@edit')->name("user.edit");

    Route::post('/account/update', 'User\UserController@update') -> name('user.update');

    Route::get('lang/{lang}', 'LanguageController@setLanguage')->name("language.setLanguage");

    Auth::routes();

});

