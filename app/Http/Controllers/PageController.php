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
    $post = Post::where('slug', $slug)->with('category')->first();

    return view('pages.post')->with('post', $post);
  }

  public function singleCategory($slug)
  {
    $category = Category::where('slug', $slug)->first();
    $posts = Post::where('category_id', $category->id)->with('category')->get();

    return view('pages.index')->with('posts', $posts);
  }
}
