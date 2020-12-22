<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::all();

    return view('admin.category.index', [
      'categories' => $categories
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();

    return view('admin.category.form', [
      'categories' => $categories
    ]);
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
      'name'       => ['required', 'min:3', 'max:150'],
    ]);

    Category::create([
      'name'       => $request->name,
      'slug'       => Str::slug($request->name),
    ]);

    return [
      'success' => true,
      'message' => 'Category Succesfully Created'
    ];
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $categories = Category::all();
    $category = Category::where('id', $id)->first();

    return view('admin.category.form', [
      'category' => $category,
      'categories' => $categories
    ]);
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
      'name'       => ['required', 'min:3', 'max:150'],
    ]);

    $category = Category::where('id', $id)->first();

    $category->update([
      'name'       => $request->name,
      'slug'       => Str::slug($request->name),
    ]);

    return [
      'success' => true,
      'message' => 'Category Succesfully changed with: ' . $request->name
    ];
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

    return response()->json([
      'success' => true,
      'message' => 'Category Succesfully deleted'
    ]);
  }
}
