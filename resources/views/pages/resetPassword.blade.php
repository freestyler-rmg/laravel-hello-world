@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<form action="{{ route('resetPassword.post') }}" method="POST" class="mb-4">
  @csrf
  <div class="mb-4">
    <input type="password" name="old_password" placeholder="Old Password" class="border border-black p-2" />
  </div>
  <div class="mb-4">
    <input type="password" name="password" placeholder="New Password" class="border border-black p-2" />
  </div>
  <div class="mb-4">
    <input type="password" name="password_confirmation" placeholder="Confirm new Password" class="border border-black p-2" />
  </div>
  <button type="submit" class="border border-black px-4 py-2 rounded cursor-pointer">Reset</button>
</form>

@if ($errors->any())
<div class="mb-4 text-red-600">
  {{ $errors->first() }}
</div>
@endif

<a href="{{ route('home') }}" class="text-blue-600 border border-blue-700 rounded px-4 py-2 inline-block">Back to home</a>
@endsection