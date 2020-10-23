<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

  public function getAllProducts()
  {
    $products = Product::orderBy('id', 'DESC')->get();

    return view('products-page')->with('products', $products);
  }

  public function saveProduct(Request $request)
  {
    Product::create([
      'name'     => $request->name,
      'stock'    => $request->stock,
      'sale'     => $request->sale,
      'price'    => $request->price,
      'category' => $request->category
    ]);

    return redirect('/product/all');
  }

  public function editProduct()
  {
    return 'This is editProduct method';
  }

  public function updateProduct()
  {
    return 'This is updateProduct method';
  }

  public function deleteProduct(Request $request)
  {
    Product::where('id', $request->product_id)->delete();

    return redirect()->back();
  }
}
