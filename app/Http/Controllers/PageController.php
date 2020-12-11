<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public function index()
  {
    return view('pages.index', [
      'posts' => Post::with('category')->get(),
    ]);
  }


  public function category($slug)
  {
    $category = Category::where('slug', $slug)->with('posts')->first();

    return view('pages.category', ['category' => $category]);
  }


  public function singlePost($slug)
  {
    $post = Post::where('slug', $slug)->first();

    return view('pages.single-post', ['post' => $post]);
  }
}
