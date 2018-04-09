<?php 

use App\Product;

Route::get('/', function () {
    $products = Product::all();

    return View::make('welcome')->with('products', $products);
});