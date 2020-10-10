<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  public function getHomePage()
  {
    $title = 'Homepage Controller Title';

    return view('content-page')
      ->with('alert_text', 'This is alert text for getHomePage')
      ->with('test_title', $title)
      ->with('text', 'This is homepage')
      ->with('color', 'green')
      ->with('show_button', true);
  }

  public function getContactPage()
  {
    return view('content-page')
      ->with('alert_text', 'This is alert text for getContactPage')
      ->with('test_title', 'Contact Controller Title')
      ->with('text', 'This is Contact Page')
      ->with('color', 'yellow')
      ->with('show_button', true);
  }

  public function getAboutPage()
  {
    return view('content-page')
      ->with('test_title', 'About Controller Title')
      ->with('text', 'This is About Page')
      ->with('color', 'blue')
      ->with('show_button', false);
  }
}
