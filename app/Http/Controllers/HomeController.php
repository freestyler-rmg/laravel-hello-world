<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
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

    return redirect()->route('home')->with('success', 'User created!');
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

    return redirect()->route('home');
  }

  public function forgotPassword()
  {
    return view('pages/forgotPassword');
  }

  public function forgotPasswordPost(ForgotPasswordRequest $request)
  {
    $validated = $request->validated();

    $user = User::where('email', $validated['email'])->first();

    if ($user) {
      $newPassword = Hash::make($validated['password']);
      $user->update(['password' => $newPassword]);

      return redirect()->route('login.index')->with('success', 'Enjoy your new password!');
    }

    return redirect()->route('login.index')->with('success', 'Enjoy your new password, you liar!');
  }

  public function resetPassword()
  {
    return view('pages/resetPassword');
  }

  public function resetPasswordPost(ResetPasswordRequest $request)
  {
    $validated = $request->validated();

    $currentUser = User::find(Auth::id());

    if (!$currentUser) {
      return redirect()->route('login')->withErrors(['auth' => 'Please login first.']);
    }

    if (!Hash::check($validated['old_password'], $currentUser->password)) {
      return back()->withErrors(['old_password' => 'Old password is incorrect']);
    }

    $newPassword = Hash::make($validated['password']);
    $currentUser->update(['password' => $newPassword]);

    return redirect()->route('home')->with('success', 'Your password has changed!');
  }
}
