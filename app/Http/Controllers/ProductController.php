<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

  public function getAllProducts()
  {
    $products = Product::all();

    return view('products-page')->with('products', $products);
  }

  public function createNewProduct()
  {
    return 'This is createNewProduct method';
  }

  public function editProduct()
  {
    return 'This is editProduct method';
  }

  public function updateProduct()
  {
    return 'This is updateProduct method';
  }

  public function deleteProduct()
  {
    return 'This is deleteProduct method';
  }
}
