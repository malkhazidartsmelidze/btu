<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
  public function home()
  {
    $posts = Post::all();

    return view('pages.index')->with('posts', $posts);
  }


  public function singlePost($slug)
  {
    dd($slug);
  }

  public function singleCategory($id)
  {
    dd('Category Id Is: ' . $id);
  }
}
