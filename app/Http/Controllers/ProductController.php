<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function index(Request $request)
  {
    $products = Product::all();

    return view('all-products')->with('products', $products);
  }

  public function edit(Request $request)
  {
    $product = Product::where('id', $request->product_id)->first();

    return view('edit-product')->with('product', $product);
  }

  public function read()
  {
    return 'This is @readmethod';
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

    return redirect('/products');
  }

  public function create()
  {
    return 'This is @createmethod';
  }

  public function store(Request $request)
  {
    Product::create([
      'name' => $request->name,
      'price' => $request->get('price'),
      'category' => $request->input('category'),
    ]);

    return redirect('/products');
  }
}
