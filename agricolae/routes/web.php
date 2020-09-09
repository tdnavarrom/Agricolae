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

    Route::get('/product/show/{id}', 'ProductController@show')->name("product.show");
    Route::get('/product/show/list/{category}', 'ProductController@list')->name("product.list");
    Route::get('/product/create', 'ProductController@create')->name("product.create");
    Route::post('/product/save', 'ProductController@save')->name("product.save");

    Route::get('product/show/{product}/reviews/create', 'ReviewController@create')->name('review.create');
    Route::post('product/show/{product}/reviews', 'ReviewController@save')->name('review.save');

    Route::get('lang/{lang}', 'LanguageController@setLanguage')->name("language.setLanguage");

    Auth::routes();

});

