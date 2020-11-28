<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public $guarded = [];
  public $timestamps = true;
  public $table = 'posts';

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id');
  }
}
