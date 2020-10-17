<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $guarded = [];
  public $table = 'products';
  public $timestamps = true;
}
