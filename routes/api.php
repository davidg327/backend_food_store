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

//Dia de venta
Route::get('sale_days', '\App\Http\Controllers\SaleDay\SaleDayIndexController@index')->name('saleDay.index');
Route::get('sale_days/{saleDay}', '\App\Http\Controllers\SaleDay\SaleDayShowController@show')->name('saleDay.show');
Route::post('sale_day', '\App\Http\Controllers\SaleDay\SaleDayCreateController@create')->name('saleDay.create');
Route::put('sale_day/{saleDay}', '\App\Http\Controllers\SaleDay\SaleDayUpdateController@update')->name('saleDay.update');
Route::get('sale_day_yesterday/{product}', '\App\Http\Controllers\SaleDay\SaleDayIndexController@getProductYesterday')->name('saleDayYesterday.index');

//Cuenta general
Route::put('general_account/{generalAccount}', '\App\Http\Controllers\GeneralAccount\GeneralAccountUpdateController@update')->name('generalAccount.update');
Route::get('general_account/find_last', '\App\Http\Controllers\GeneralAccount\GeneralAccountIndexController@getFindLast')->name('generalAccount.index');
