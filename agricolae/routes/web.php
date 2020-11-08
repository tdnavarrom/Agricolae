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

    Route::get('/sponsors', 'SponsorController@show')->name("sponsor.show");
    
    Route::get('/account/show', 'User\UserController@show')->name("user.show");
    Route::get('/account/edit', 'User\UserController@edit')->name("user.edit");
    Route::post('/account/update', 'User\UserController@update') -> name('user.update');

    // Product
    Route::get('/product/show/{id}', 'ProductController@show')->name("product.show");
    Route::get('/product/all', 'ProductController@list_all')->name("product.list_all");
    Route::get('/product/{category}', 'ProductController@list_category')->name("product.list_cat");

    Route::get('/product/all/best', 'ProductController@list_all_best_rating')->name("product.list_all_best_rating");
    Route::get('/product/all/worst', 'ProductController@list_all_worst_rating')->name("product.list_all_worst_rating");

    Route::get('/product/{category}/best', 'ProductController@list_category_best_rating')->name("product.list_cat_best_rating");
    Route::get('/product/{category}/worst', 'ProductController@list_category_worst_rating')->name("product.list_cat_worst_rating");

    // About Us
    Route::get('/About-us', 'HomeController@about_us')->name("about.index");

    // Contact Us
    Route::get('/Contact-us', 'HomeController@contact_us')->name("contact.index");
    
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

    //Location
    Route::get('/account/location/list', 'LocationController@list')->name('location.list');
    Route::get('/account/location/create', 'LocationController@create')->name('location.create');
    Route::post('/account/location/save', 'LocationController@save')->name('location.save');
    Route::get('/account/location/edit/{id}', 'LocationController@edit')->name('location.edit');
    Route::post('/account/location/update/{id}', 'LocationController@update')->name('location.update');
    Route::delete('/account/location/delete/{id}', 'LocationController@delete')->name('location.delete');

    //Cart
    Route::get('/cart/show', 'ProductController@cart')->name("product.cart");
    Route::post('/cart/add-to-cart/{id}', 'ProductController@addToCart')->name("product.addToCart");
    Route::get('/cart/remove', 'ProductController@removeCart')->name("product.removeCart");
    Route::post('/cart/buy', 'ProductController@buy')->name("product.buy");
    Route::post('/cart/pdf', 'ProductController@createPdf')->name("product.pdf");

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

    //Orders
    Route::get('/account/order/list', 'OrderController@list')->name('order.list');
    Route::get('/account/order/show/{id}', 'OrderController@show')->name('order.show');
    
    //Lang
    Route::get('lang/{lang}', 'LanguageController@setLanguage')->name("language.setLanguage");

    // Auth
    Auth::routes();

});

