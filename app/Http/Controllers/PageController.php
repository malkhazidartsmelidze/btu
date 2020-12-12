<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    $post = Post::where('slug', $slug)->with('category')->firstOrFail();

    return view('pages.post')->with('post', $post);
  }

  public function singleCategory($slug)
  {
    $category = Category::where('slug', $slug)->firstOrFail();

    return view('pages.category')->with('posts', $category->posts);
  }
}
