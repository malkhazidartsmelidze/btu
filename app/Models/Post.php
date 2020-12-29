<?php

namespace App\Models;

use App\Traits\HasName;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasName;

  public $guarded = [];
  public $timestamps = true;
  public $table = 'posts';

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }
}
