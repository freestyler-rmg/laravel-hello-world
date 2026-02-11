<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
  public function index()
  {
    return view('pages/home');
  }

  public function register()
  {
    return view('pages/register');
  }

  public function registerPost(StoreUserRequest $request)
  {
    $validated = $request->validated();

    User::create($validated);

    return redirect()->route('register.index')->with('success', 'User created!');
  }

  public function login()
  {
    return view('pages/login');
  }

  public function loginPost(LoginRequest $request)
  {
    $validated = $request->validated();

    $user = User::where('email', $validated['email'])->first();

    if (!$user || !Hash::check($validated['password'], $user->password)) {
      return back()->withErrors(['email' => 'Wrong email or password']);
    }

    Auth::login($user);

    return redirect()->route('home')->with('success', 'Logged in successfully!');
  }

  public function logout()
  {
    Auth::logout();

    return redirect()->route('home')->with('success', 'Logged out successfully!');
  }
}
