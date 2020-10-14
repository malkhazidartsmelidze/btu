<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  public function getHomePage()
  {
    return view('content-page')
      ->withText('This is Homepage 2')
      ->with('footer_text', "THis is example footer text from controller");
  }

  public function getContactPage()
  {
    return view('content-page')
      ->withFooter(false)
      ->with('text', 'This is contact Page')
      ->with('footer_text', "THis is example footer text from controller getContactPage Method");;
  }

  public function getAboutPage()
  {
    return view('content-page')
      ->withFooter(true)
      ->withText('This is About Page')
      ->with('footer_text', "THis is example footer text from controller getAboutPage Method");;
  }
}
