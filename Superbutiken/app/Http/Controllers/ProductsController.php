<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use App\Store;
use App\Product_Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller {

  public function index() {
    $products = Product::all();
    return response()->json($products);
  }

  public function show($id) {
    $product = Product::find($id);
    $product->stores = DB::table('stores')
    ->join('product_stores', 'stores.id', '=', 'product_stores.store_id')
    ->where('product_stores.product_id', '=', $id)->get();

    $product->reviews = Review::where('product_id', '=', $id)->get();

    return response()->json($product);
  }

  public function create(Request $request) {
    $product = new Product;
    $product->title       = $request->input("title");
    $product->brand       = $request->input("brand");
    $product->image       = $request->input("image");
    $product->description = $request->input("description");
    $product->price       = $request->input("price");
    $product->save();

    foreach ($request->get("stores") as $store) {
      $product_Store              = new Product_Store;
      $product_Store->store_id    = $store;
      $product_Store->product_id  = $product->id;
      $product_Store->save();
    }

    return response()->json(["Successful" => true]);
  }
}
