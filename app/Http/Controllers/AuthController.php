<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function customLogin(Request $request)
  {
    $user = User::where('email', $request->email)->first();
    if (!$user) {
      return abort(401);
    }

    if (!Hash::check($request->password, $user->password)) {
      return abort(401);
    }

    Auth::login($user);

    return redirect()->route('admin.home');
  }

  public function customLogout(Request $request)
  {
    Auth::logout();

    return redirect()->route('login');
  }

  public function customRegister(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string', 'min:10', 'max:100'],
      'email' => ['required', 'email', 'max:100'],
      'password' => ['required', 'min:5', 'max:25', 'confirmed'],
    ]);

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password)
    ]);

    return redirect()->route('login');
  }
}
