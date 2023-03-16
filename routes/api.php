<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Producto
Route::get('products', '\App\Http\Controllers\Product\ProductIndexController@index')->name('product.index');
Route::post('product', '\App\Http\Controllers\Product\ProductCreateController@create')->name('product.create');
Route::put('product/{product}', '\App\Http\Controllers\Product\ProductUpdateController@update')->name('product.update');

