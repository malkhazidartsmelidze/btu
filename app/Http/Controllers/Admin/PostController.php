<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::all();

    return view('admin.post.index', [
      'posts' => $posts
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

    return view('admin.post.form', [
      'categories' => $categories,
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
      'title'       => ['required', 'min:3', 'max:255'],
      'slug'        => ['nullable', 'min:3', 'max:255'],
      'text'        => ['required', 'min:3'],
      'category_id' => ['nullable', 'numeric'],
      'image'       => ['required', 'image'],
    ]);

    $image = $request->file('image');
    $filename = time() . '-' . $image->getClientOriginalName();
    $dir = public_path('post-images');
    $image->move($dir, $filename);
    $image_url = "/post-images/$filename";

    Post::create([
      'title'       => $request->title,
      'slug'        => Str::slug($request->slug ? $request->slug : $request->title),
      'text'        => $request->text,
      'category_id' => $request->category_id,
      'image'       => $image_url,
    ]);

    return redirect()->route('admin.post.index');
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
    $post = Post::where('id', $id)->first();
    $categories = Category::all();

    return view('admin.post.form', [
      'post' => $post,
      'categories' => $categories,
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
      'title'       => ['required', 'min:3', 'max:255'],
      'slug'        => ['nullable', 'min:3', 'max:255'],
      'text'        => ['required', 'min:3'],
      'category_id' => ['nullable', 'numeric'],
      'image'       => ['nullable', 'image'],
    ]);

    $post = Post::where('id', $id)->first();

    if ($request->file('image')) {
      $image = $request->file('image');
      $filename = time() . '-' . $image->getClientOriginalName();
      $dir = public_path('post-images');
      $image->move($dir, $filename);
      $image_url = "/post-images/$filename";
    }

    $post->update([
      'title'       => $request->title,
      'slug'        => Str::slug($request->slug ? $request->slug : $request->title),
      'text'        => $request->text,
      'category_id' => $request->category_id,
      'image'       => isset($image_url) ? $image_url : $post->image
    ]);

    return redirect()->route('admin.post.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Post::where('id', $id)->delete();

    return redirect()->route('admin.post.index');
  }
}
