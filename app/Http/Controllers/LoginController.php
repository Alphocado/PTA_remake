<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('login', [
      'title' => 'Login'
    ]);
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'nis' => 'required|numeric',
      'password' => 'required'
    ]);
    // dd('ada error');
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('/');
    }
    return back()->with('loginError', 'Login failed');
  }

  public function logout()
  {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
  }
}
