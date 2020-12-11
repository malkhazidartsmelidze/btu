<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
  public function home()
  {
    $posts = Post::with('category')->whereHas('category')->get();

    return view('pages.index')->with('posts', $posts);
  }


  public function singlePost($slug)
  {
    $post = Post::where('slug', $slug)->firstOrFail();

    return view('pages.single-post')->with('post', $post);
  }

  public function singleCategory($slug)
  {
    $category = Category::where('slug', $slug)->with('posts')->firstOrFail();

    return view('pages.category')->with('category', $category);
  }
}
