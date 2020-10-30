<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

  public function getAllProducts(Request $request)
  {
    $products = Product::orderBy('id', 'DESC');

    if ($request->id) {
      $products->where('id', $request->id);
    }

    if ($request->name) {
      $products->where('name', 'LIKE', '%' . $request->name . '%');
    }

    if ($request->category) {
      $products->where('category', $request->category);
    }

    if ($request->price) {
      $products->where('price', '>', $request->price);
    }

    if ($request->stock) {
      $products->where('stock', '<', $request->stock);
    }

    if ($request->sale) {
      $products->where('sale', '=', $request->sale);
    }

    $products = $products->get();

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

    return redirect()->route('products.all');
  }

  public function editProduct($id)
  {
    $product_to_edit = Product::where('id', $id)->firstOrFail();

    return view('edit-form')->with('product', $product_to_edit);
  }

  public function updateProduct(Request $request, $id)
  {
    Product::where('id', $id)->update([
      'name'     => $request->name,
      'price'    => $request->price,
      'stock'    => $request->stock,
      'sale'     => $request->sale,
      'category' => $request->category
    ]);

    return redirect()->back();
  }

  public function deleteProduct(Request $request)
  {
    Product::where('id', $request->product_id)->delete();

    return redirect()->back();
  }
}
