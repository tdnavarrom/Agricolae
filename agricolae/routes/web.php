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

    // User

    // Product
    Route::get('/product/show/{id}', 'ProductController@show')->name("product.show");
    Route::get('/product/all', 'ProductController@list_all')->name("product.list_all");
    Route::get('/product/{category}', 'ProductController@list_category')->name("product.list_cat");
    // Review
    Route::get('product/reviews/create-{product}', 'ReviewController@create')->name('review.create');
    Route::post('product/reviews-{product}', 'ReviewController@save')->name('review.save');

    Route::get('dashboard/reviews/list', 'ReviewController@list')->name('review.list');
    Route::get('dashboard/reviews/{id}-{product}', 'ReviewController@show')->name('review.show');
    Route::delete('dashboard/reviews/{id}/delete', 'ReviewController@delete')->name('review.delete');

    Route::get('dashboard/reviews/{id}/edit', 'ReviewController@edit')->name('review.edit');
    Route::post('dasboard/reviews/{id}/update', 'ReviewController@update')->name('review.update');



    //Farmer

    //Product
    Route::get('/farmer/product/create', 'Farmer\FarmerProductController@create')->name("farmer.product.create");
    Route::post('/farmer/product/save', 'Farmer\FarmerProductController@save')->name("farmer.product.save");
    Route::delete('/farmer/product/{id}/delete', 'Farmer\FarmerProductController@delete')->name('farmer.product.delete');

    Route::get('/farmer/product/{id}/edit', 'Farmer\FarmerProductController@edit')->name("farmer.product.edit");
    Route::post('/farmer/product/{id}/update', 'Farmer\FarmerProductController@update')->name('farmer.product.update');

    Route::get('/farmer/product/all', 'Farmer\FarmerProductController@list_all')->name("farmer.product.list");
    Route::get('/farmer/product/{category}', 'Farmer\FarmerProductController@list_cat')->name("farmer.product.list_cat");
    Route::get('/farmer/product/show/{id}', 'Farmer\FarmerProductController@show')->name("farmer.product.show");

    //Review
    Route::get('/farmer/product/reviews/{id}-{product}', 'Farmer\FarmerReviewController@show')->name('farmer.review.show');
    
    //Lang
    Route::get('lang/{lang}', 'LanguageController@setLanguage')->name("language.setLanguage");

    Auth::routes();

});

