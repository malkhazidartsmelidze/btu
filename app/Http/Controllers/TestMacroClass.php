<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Traits\Macroable;

class TestMacroClass
{
  use Macroable;

  public $testfield = 'testval';

  public function convertfiledtoupper()
  {
    return strtoupper($this->testfield);
  }
}
