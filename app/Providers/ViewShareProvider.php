<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewShareProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    // 
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    if (app()->runningInConsole()) return;

    $categories = Category::all();
    $configs = Config::all()->pluck('value', 'name')->toArray();

    config()->set('custom', $configs);

    View::share('_CATEGORIES', $categories);
  }
}
