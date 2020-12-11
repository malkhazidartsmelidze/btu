<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConfigController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $configs = Config::all();

    return view('admin.config.index', [
      'configs' => $configs
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.config.form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name'       => ['required', 'min:3', 'max:150'],
    ]);

    Config::create([
      'name'       => $request->name,
      'value'      => $request->value
    ]);

    return redirect()->route('admin.config.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $config = Config::where('id', $id)->first();

    return view('admin.config.form', [
      'config' => $config
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'name'       => ['required', 'min:3', 'max:150'],
    ]);

    $config = Config::where('id', $id)->first();

    $config->update([
      'name'       => $request->name,
      'value'       => $request->value
    ]);

    return redirect()->route('admin.config.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Config::where('id', $id)->delete();

    return redirect()->route('admin.config.index');
  }
}
