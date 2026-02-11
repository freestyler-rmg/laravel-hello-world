@extends('layouts.app')

@section('title', 'Login')

@section('content')
<form action="{{ route('login.post') }}" method="POST" class="mb-4">
  @csrf
  <div class="mb-4">
    <input type="email" name="email" placeholder="Email" class="border border-black p-2" />
  </div>
  <div class="mb-4">
    <input type="password" name="password" placeholder="Password" class="border border-black p-2" />
  </div>
  <button type="submit" class="border border-black px-4 py-2 rounded">Login</button>
</form>

@if ($errors->any())
<div class="mb-4 text-red-600">
  {{ $errors->first() }}
</div>
@endif

<hr class="mb-4" />

<a href="{{ route('home') }}" class="text-blue-600 border border-blue-700 rounded px-4 py-2 inline-block">Back to home</a>
@endsection