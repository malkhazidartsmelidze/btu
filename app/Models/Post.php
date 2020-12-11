<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public $table = 'posts';
  public $guarded = [];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
