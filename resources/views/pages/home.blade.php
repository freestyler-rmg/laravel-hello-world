@extends('layouts.app')

@section('title', 'Home')

@section('content')
<h1 class="mb-4 text-2xl font-bold">Hello World!</h1>

@if (session('success'))
<div class="mb-4 text-green-600">
  {{ session('success') }}
</div>
@endif

@if (auth()->check())
<div class="mb-4">
  You are logged in as: <span class="font-semibold">{{ auth()->user()->name }}</span>
</div>
@else
<div class="mb-4">
  <div class="mb-2">
    <a href="{{ route('register.index') }}" class="text-white bg-blue-700 px-4 py-2 rounded inline-block">Register</a>
  </div>
  <div>
    <a href="{{ route('login.index') }}" class="text-white bg-blue-700 px-4 py-2 rounded inline-block">Login</a>
  </div>
</div>
@endif

<div class="mb-4">
  <a href="{{ route('testCrud.index') }}" class="text-blue-600 border border-blue-700 rounded px-4 py-2 inline-block">Test CRUD Page</a>
</div>

@if (auth()->check())
<div class="mb-4">
  <a href="{{ route('resetPassword.index') }}" class="text-white bg-gray-700 rounded px-4 py-2 inline-block">Reset Password</a>
</div>
<div>
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="text-red-700 cursor-pointer border border-red-700 rounded px-4 py-2">Logout</button>
  </form>
</div>
@endif
@endsection