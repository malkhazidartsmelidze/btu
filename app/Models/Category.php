<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public $table = 'categories';
  public $guarded = [];

  public function posts()
  {
    return $this->hasMany(Post::class);
  }
}
