<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
  public $guarded = [];
  public $timestamps = true;
  public $table = 'configs';
}
