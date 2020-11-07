<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthorizationController extends Controller
{
  public function register(Request $request)
  {
    $request->validate([
      'name' => ['required', 'min:10', 'max:50', 'string'],
      'email' => 'required|email',
      'password' => 'required|min:10|max:20|confirmed'
    ]);

    return User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password)
    ]);
  }

  public function login(Request $request)
  {
    $user = User::where('email', $request->email)->first();

    if (!$user) {
      return redirect()->back();
    }

    if (!Hash::check($request->password, $user->password)) {
      return redirect()->back();
    }

    Auth::loginUsingId($user->id);

    return redirect('/home');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    return redirect()->route('login');
  }
}
