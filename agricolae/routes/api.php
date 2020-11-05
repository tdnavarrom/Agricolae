<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', 'Api\ProductApi@index')->name('name.product.index');
Route::get('products/{id}', 'Api\ProductApi@show')->name('name.product.show');

Route::get('products/rating/best', 'Api\ProductApi@bestRating')->name('name.product.best_rating');
Route::get('products/rating/worst', 'Api\ProductApi@worstRating')->name('name.product.worst_rating');

Route::get('users', 'Api\UserApi@index')->name('name.user.index');
Route::get('users/{id}', 'Api\UserApi@show')->name('name.user.show');

