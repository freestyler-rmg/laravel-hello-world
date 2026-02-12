@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="flex justify-between items-center">
  <form action=" {{ route('testCrud.store') }}" method="POST">
    @csrf
    <input type="text" placeholder="Enter something" required class="border px-2 py-1 rounded" name="name" />
    <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded cursor-pointer">Submit</button>
  </form>

  <a href="{{ route('home') }}" class="text-blue-600 border border-blue-700 rounded px-4 py-2 inline-block">Back to Home</a>
</div>

<hr class="my-4" />

<ol class="space-y-2">
  @foreach($items as $item)
  <li class="border p-2 rounded flex justify-between items-center">
    <form id="update-form-{{ $item->id }}" action="{{ route('testCrud.update', $item->id) }}" method="POST" class="flex gap-2 items-center">
      @csrf
      @method('PUT')
      <p>{{ $item->id }} |</p>
      <input type="text" name="name" value="{{ $item->name }}" class="border px-2 py-1 rounded" />
    </form>
    <div class="flex gap-2">
      <button
        type="submit"
        form="update-form-{{ $item->id }}"
        class="bg-orange-500 text-white rounded cursor-pointer px-2 py-1">Edit</button>
      <form action="{{ route('testCrud.delete', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white rounded cursor-pointer px-2 py-1">Delete</button>
      </form>
    </div>
  </li>
  @endforeach
</ol>
@endsection