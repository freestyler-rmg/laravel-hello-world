<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class TestCrudController extends Controller
{
  public function index()
  {
    $items = Item::all();
    return view('pages/testCrud', compact('items'));
  }

  public function store(Request $request)
  {
    // Validate the input
    $validated = $request->validate([
      'name' => 'required|string|max:100',
    ]);

    // Create the item
    Item::create($validated);

    return redirect()->route('testCrud.index')->with('success', 'Item created!');
  }

  public function delete($id)
  {
    $item = Item::find($id);
    $item->delete();
    return redirect()->route('testCrud.index')->with('success', 'Item deleted!');
  }

  public function update(Request $request, $id)
  {
    // 1) Validate input
    $validated = $request->validate([
      'name' => 'required|string|max:100',
    ]);

    // 2) Find the item
    $item = Item::find($id); // you can use findOrFail($id) if you want a 404 on missing

    // 3) Update it
    $item->update($validated);

    // 4) Redirect back with a flash message
    return redirect()->route('testCrud.index')->with('success', 'Item updated!');
  }
}
