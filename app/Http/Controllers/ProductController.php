<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Product;

class ProductController extends Controller {

    public function index() {
        $products = Product::all();
        return view('welcome')->with('products', $products);
    }

    public function edit($product_id) {
        $product = Product::find($product_id);
        return Response::json($product);
    }

    public function store(Request $request) {
        $product = Product::create($request->all());
        return Response::json($product);
    }

    public function update(Request $request, $product_id) {
        $product = Product::find($product_id);
        $product->name = $request->name;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->product_image = $request->product_image;

        $product->save();

        return Response::json($product);
    }

    public function destroy($product_id) {
        $product = Product::destroy($product_id);
        return Response::json($product);
    }

}
