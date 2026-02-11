<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class TestCrudApiController extends Controller
{
  public function index(Request $request)
  {
    $perPage = (int) $request->query('per_page', 10);
    $items = Item::orderBy('id', 'desc')->paginate($perPage);

    return ItemResource::collection($items);
  }

  public function store(StoreItemRequest $request)
  {
    // Validate the input
    $validated = $request->validated();

    // Create the item
    $item = Item::create($validated);

    return response()->json(['message' => 'Item created', 'data' => new ItemResource($item)], 201);
  }

  public function delete($id)
  {
    $item = Item::find($id);
    if (!$item) {
      return response()->json(['message' => 'Item not found'], 404);
    }

    $item->delete();

    return response()->json(['message' => 'Item deleted', 'data' => new ItemResource($item)]);
  }

  public function update(UpdateItemRequest $request, $id)
  {
    $validated = $request->validated();

    $item = Item::find($id);

    if (!$item) {
      return response()->json(['message' => 'Item not found'], 404);
    }

    $item->update($validated);

    return response()->json(['message' => 'Item updated', 'data' => new ItemResource($item)]);
  }

  public function search(Request $request)
  {
    $search = $request->input('search');

    $items = Item::where('name', 'like', '%' . $search . '%')->get();

    return response()->json(ItemResource::collection($items));
  }
}
