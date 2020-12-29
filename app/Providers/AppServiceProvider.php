<?php

namespace App\Providers;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\TestMacroClass;
use App\Models\Category;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    Schema::defaultStringLength(100);

    // Category::macro('getNameAndPostCount', function () {
    //   return [
    //     $this->name,
    //     $this->posts()->count()
    //   ];
    // });

    TestMacroClass::macro('convertfiledtoupper', function () {
      return strtoupper($this->testfield);
    });

    Str::macro('joinAndSnake', function ($param1, $param2) {
      return Str::snake($param1 . $param2);
    });

    Request::macro('getNameParameterAndConverToUpper', function () {
      return strtoupper($this->name);
    });
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    $configs = Config::all()->pluck('value', 'key')->toArray();
    foreach ($configs as $key => $value) {
      config()->set($key, $value);
    }
  }
}
