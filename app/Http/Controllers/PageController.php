<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\SaveUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{

  public function testRequestPost(Category $cat, Post $p)
  {
    dd($p->getNameColumn(), $cat->getNameColumn());
    // dd($request->getNameParameterAndConverToUpper());
    // dd(Str::joinAndSnake('Post::lef|tJoin(categories)', 'StrtoJoin'));
  }

  public function home()
  {
    $posts = Post::leftJoin('categories', 'categories.id', '=', 'posts.category_id')
      ->select('posts.*', 'categories.name as category_name', 'categories.slug as category_slug')
      ->get();

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
