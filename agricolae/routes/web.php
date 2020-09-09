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

Route::group(['middleware' => 'lang'], function () {
    
    Route::get('/home', 'HomeController@index')->name("home.index");

    Route::get('/product/show/{id}', 'ProductController@show')->name("product.show");
    Route::get('/product/all', 'ProductController@list_all')->name("product.list_all");
    Route::get('/product/{category}', 'ProductController@list_category')->name("product.list_cat");
    Route::get('/product/create', 'ProductController@create')->name("product.create");
    Route::post('/product/save', 'ProductController@save')->name("product.save");

    Route::get('product/reviews/create-{product}', 'ReviewController@create')->name('review.create');
    Route::post('product/reviews-{product}', 'ReviewController@save')->name('review.save');
    
    Route::get('dashboard/reviews/list', 'ReviewController@list')->name('review.list');
    Route::get('dashboard/reviews/{id}', 'ReviewController@show')->name('review.show');
    Route::get('dashboard/reviews/{id}/delete', 'ReviewController@show')->name('review.delete');

    Route::get('admin/product/all', 'ProductController@admin_list_all')->name("product.admin_list");
    Route::get('admin/product/{category}', 'ProductController@admin_list_cat')->name("product.admin_list_cat");
    Route::get('admin/product/show/{id}', 'ProductController@admin_show')->name("product.admin_show");
    Route::delete('admin/product/{id}/delete', 'ProductController@delete')->name('product.delete');

    Route::get('admin/product/reviews/{id}-{product}', 'ReviewController@admin_show')->name('review.admin_show');


    Route::get('lang/{lang}', 'LanguageController@setLanguage')->name("language.setLanguage");

});
