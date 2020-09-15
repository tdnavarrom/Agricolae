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
    
    // Home
    Route::get('/', 'HomeController@index')->name("home.index");

    Route::get('/account/show', 'User\UserController@show')->name("user.show");
    Route::get('/account/edit', 'User\UserController@edit')->name("user.edit");
    Route::post('/account/update', 'User\UserController@update') -> name('user.update');

    // Product
    Route::get('/product/show/{id}', 'ProductController@show')->name("product.show");
    Route::get('/product/all', 'ProductController@list_all')->name("product.list_all");
    Route::get('/product/{category}', 'ProductController@list_category')->name("product.list_cat");
    
    // Review
    Route::get('/product/review/create/{product}', 'ReviewController@create')->name('review.create');
    Route::post('/product/review/save/{product}', 'ReviewController@save')->name('review.save');
    Route::get('/product/review/edit/{id}', 'ReviewController@edit')->name('review.edit');
    Route::post('/product/review/update/{id}', 'ReviewController@update')->name('review.update');
    Route::delete('/product/review/delete/{id}', 'ReviewController@delete')->name('review.delete');

    //Wishlist
    Route::get('/account/wishlist/list', 'WishlistController@list')->name('wishlist.list');
    Route::post('/account/wishlist/save/{product}', 'WishlistController@save')->name('wishlist.save');
    Route::delete('/account/wishlist/delete/{product}', 'WishlistController@delete')->name('wishlist.delete');

    //Cart
    Route::get('/cart/show', 'ProductController@cart')->name("product.cart");
    Route::post('/cart/add-to-cart/{id}', 'ProductController@addToCart')->name("product.addToCart");
    Route::get('/cart/remove', 'ProductController@removeCart')->name("product.removeCart");
    Route::post('/cart/buy', 'ProductController@buy')->name("product.buy");

    //Farmer
    Route::get('/farmer/dashboard', 'Farmer\FarmerHomeController@index')->name("farmer.index");
    Route::get('/farmer/dashboard/product/create', 'Farmer\FarmerProductController@create')->name("farmer.product.create");
    Route::post('/farmer/dashboard/product/save', 'Farmer\FarmerProductController@save')->name("farmer.product.save");
    Route::delete('/farmer/dashboard/product/delete/{id}', 'Farmer\FarmerProductController@delete')->name('farmer.product.delete');

    Route::get('/farmer/dashboard/product/edit/{id}', 'Farmer\FarmerProductController@edit')->name("farmer.product.edit");
    Route::post('/farmer/dashboard/product/update/{id}', 'Farmer\FarmerProductController@update')->name('farmer.product.update');

    Route::get('/farmer/dashboard/product/all', 'Farmer\FarmerProductController@list_all')->name("farmer.product.list");
    Route::get('/farmer/dashboard/product/{category}', 'Farmer\FarmerProductController@list_cat')->name("farmer.product.list_cat");
    Route::get('/farmer/dashboard/product/show/{id}', 'Farmer\FarmerProductController@show')->name("farmer.product.show");
    
    //Lang
    Route::get('lang/{lang}', 'LanguageController@setLanguage')->name("language.setLanguage");

    // Auth
    Auth::routes();

});

