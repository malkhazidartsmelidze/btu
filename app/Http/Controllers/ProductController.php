<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function createProduct()
  {
    Product::create([
      'name' => 'Raze Blade 15',
      'category' => 'Laptops',
      'price' => 500
    ]);
  }


  public function getAllProducts()
  {
    $products = Product::all();

    return view('all-products')->with('products', $products);
  }
}
