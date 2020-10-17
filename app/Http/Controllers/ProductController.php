<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function createProduct()
  {
    Product::create([
      'name' => 'Laptop ' . uniqid(),
      'price' => rand(100, 1000),
      'category' => 'Computers'
    ]);

    return redirect('/product/all');
  }

  public function viewProducts()
  {
    $products = Product::all();

    return view('products-page')->with('products', $products);
  }
}
