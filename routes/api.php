<?php

use Illuminate\Http\Request;
use App\Product;

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


Route::group(['middleware' => [ 'api']], function () {
    Route::get('/prods', 'ProductController@index');
    Route::get('/products/{product_id?}', 'ProductController@edit');
    Route::post('/products', 'ProductController@store');
    Route::put('/products/{product_id?}', 'ProductController@update');
    Route::delete('/products/{product_id?}', 'ProductController@destroy');
});
