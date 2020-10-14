<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  public function getHomePage()
  {
    return view('home');
  }

  public function getContactPage()
  {
    return view('contact');
  }

  public function getAboutPage()
  {
    return view('about-us');
  }
}
