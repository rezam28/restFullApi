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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Customer
Route::get('/customer', 'App\Http\Controllers\CustomerController@get');
Route::get('/customer/{id}', 'App\Http\Controllers\CustomerController@getbyid');
Route::post('/customer', 'App\Http\Controllers\CustomerController@post');
Route::put('/customer/{id}', 'App\Http\Controllers\CustomerController@put');
Route::delete('/customer{id}', 'App\Http\Controllers\CustomerController@delete');

// Product
Route::get('/product', 'App\Http\Controllers\ProductController@get');
Route::get('/product/{id}', 'App\Http\Controllers\ProductController@getbyid');
Route::post('/product', 'App\Http\Controllers\ProductController@post');
Route::put('/product/{id}', 'App\Http\Controllers\ProductController@put');
Route::delete('/product{id}', 'App\Http\Controllers\ProductController@delete');