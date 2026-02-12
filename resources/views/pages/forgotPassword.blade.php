@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<form action="{{ route('forgotPassword.post') }}" method="POST" class="mb-4">
  @csrf
  <div class="mb-4">
    <input type="email" name="email" placeholder="Registered Email" class="border border-black p-2" />
  </div>
  <div class="mb-4">
    <input type="password" name="password" placeholder="New Password" class="border border-black p-2" />
  </div>
  <div class="mb-4">
    <input type="password" name="password_confirmation" placeholder="Confirm New Password" class="border border-black p-2" />
  </div>
  <button type="submit" class="border border-black px-4 py-2 rounded cursor-pointer">Submit New Password</button>
</form>

@if ($errors->any())
<div class="mb-4 text-red-600">
  {{ $errors->first() }}
</div>
@endif

<hr class="mb-4" />

<a href="{{ route('login.index') }}" class="text-blue-600 border border-blue-700 rounded px-4 py-2 inline-block">Back to login</a>
@endsection