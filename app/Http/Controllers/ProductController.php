<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function index(Request $request)
  {
    $products = Product::query();

    if ($request->id) {
      $products->where('id', $request->id);
    }

    if ($request->min_price) {
      $products->where('price', '>=', $request->min_price);
    }

    if ($request->max_price) {
      $products->where('price', '<=', $request->max_price);
    }

    if ($request->category) {
      $products->where('category', 'LIKE', '%' . $request->category . '%');
    }

    if ($request->name) {
      $products->where('name', 'LIKE', '%' . $request->name . '%');
    }

    $products = $products->get();

    return view('all-products')->with('products', $products)->with('filter', $request);
  }

  public function edit(Request $request)
  {
    $product = Product::where('id', $request->product_id)->first();

    return view('edit-product')->with('product', $product);
  }

  public function update(Request $request)
  {
    Product::where('id', $request->id)->update([
      'name'     => $request->name,
      'price'    => $request->price,
      'category' => $request->category
    ]);

    return redirect()->back();
  }

  public function delete(Request $request)
  {
    Product::where('id', $request->product_id)->delete();

    return redirect()->route('products.all');
  }

  public function store(Request $request)
  {
    Product::create([
      'name' => $request->name,
      'price' => $request->get('price'),
      'category' => $request->input('category'),
    ]);

    return redirect()->route('products.all');
  }
}
