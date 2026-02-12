<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CredentialApiController extends Controller
{
  public function register(StoreUserRequest $request)
  {
    $validated = $request->validated();

    $user = User::create($validated);

    return response()->json(['message' => 'User created!', 'data' => $user]);
  }
}
