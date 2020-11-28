<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cateories = Category::all();

    return view('admin.category.index')->with('categories', $cateories);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required', 'min:2', 'max:100'],
    ]);

    Category::create([
      'name' => $request->name,
      'slug' => Str::slug($request->name)
    ]);

    return redirect()->route('admin.category.index');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $category = Category::where('id', $id)->first();

    return view('admin.category.edit')->with('category', $category);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => ['required', 'min:2', 'max:100']
    ]);

    Category::where('id', $id)->update([
      'name' => $request->name,
      'slug' => Str::slug($request->name),
    ]);

    return redirect()->route('admin.category.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Category::where('id', $id)->delete();

    return redirect()->route('admin.category.index');
  }
}
