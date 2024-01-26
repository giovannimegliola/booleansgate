<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = $request->query('category', 'all');
        $name = $request->query('name');

        $items = Item::when($category !== 'all', function ($query) use ($category) {
            return $query->where('category', $category);
        })
            ->when($name, function ($query) use ($name) {
                return $query->where('name', 'like', "%$name%");
            })
            ->get();

        return view('admin.items.index', compact('items', 'category', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $formData = $request->validated();
        $slug = Str::slug($formData['name'], '-');
        $formData['slug'] = $slug;
        if ($request->hasFile('image')) {
            $path = Storage::put('img', $formData['image']);
            $formData['image'] = $path;
        }
        $newItem = Item::create($formData);
        return to_route('admin.items.show', $newItem->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $formData = $request->validated();
        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::delete($item->image);
            }
            $path = Storage::put('uploads', $formData['image']);
            $formData['image'] = $path;
        }
        $item->fill($formData);
        $item->update();
        return to_route('admin.items.show', $item->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        if ($item->image) {
            Storage::delete($item->image);
        }
        $item->delete();
        return to_route('admin.items.index')->with('message', "Item : '$item->name' was deleted successfully!");
    }
}
