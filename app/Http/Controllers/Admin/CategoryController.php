<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
  public function index()
  {
    $cateories = Category::all();

    return view('admin.category.index')->with('categories', $cateories);
  }

  public function edit($id)
  {
    $category = Category::where('id', $id)->first();

    return view('admin.category.edit')->with('category', $category);
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => ['required', 'min:2', 'max:100']
    ]);

    Category::where('id', $id)->update([
      'name' => $request->name,
    ]);

    return redirect()->route('admin.category.index');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required', 'min:2', 'max:100']
    ]);

    Category::create([
      'name' => $request->name,
    ]);

    return redirect()->route('admin.category.index');
  }

  public function delete($id)
  {
    Category::where('id', $id)->delete();

    return redirect()->route('admin.category.index');
  }
}
