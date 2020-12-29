<?php

namespace App\Models;

use App\Traits\HasName;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Support\Traits\Macroable;

class Category extends Model
{
  use HasName;

  public $table = 'categories';
  public $fillable = ['id', 'name', 'slug'];

  public function posts()
  {
    return $this->hasMany(Post::class, 'category_id', 'id');
  }
}
