<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
  public function home()
  {
    $posts = Post::with('category')->get();

    return view('pages.index')->with('posts', $posts);
  }


  public function singlePost($slug)
  {
    $post = Post::where('slug', $slug)->first();

    return view('pages.single-post')->with('post', $post);
  }

  public function singleCategory($slug)
  {
    $category = Category::where('slug', $slug)->with('posts')->first();

    return view('pages.category')->with('category', $category);
  }
}
