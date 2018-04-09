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
    Route::get('prods', function () {
        $products = Product::all();

        return View::make('welcome')->with('products', $products);
    });

    Route::get('/products/{product_id?}', function($product_id) {
        //  dd($product_id);
        $product = Product::find($product_id);

        return Response::json($product);
    });

    Route::post('/products', function(Request $request) {
        $product = Product::create($request->all());

        return Response::json($product);
    });

    Route::put('/products/{product_id?}', function(Request $request, $product_id) {

        $product = Product::find($product_id);

        $product->name = $request->name;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->product_image = $request->product_image;

        $product->save();

        return Response::json($product);
    });

    Route::delete('/products/{product_id?}', function($product_id) {
        $product = Product::destroy($product_id);

        return Response::json($product);
    });
});
