<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public $table = 'categories';
  public $fillable = ['id', 'name', 'slug'];

  public function posts()
  {
    return $this->hasMany(Post::class, 'category_id', 'id');
  }
}
