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
        $category = $request->query('category');
        if (!empty($category)) {
            switch ($category) {
                case 'all':
                    $items = Item::all();
                    break;
                case 'Simple Melee':
                    $items = Item::where('category', 'Simple Melee')->get();
                    break;
                case 'Simple Ranged':
                    $items = Item::where('category', 'Simple Ranged')->get();
                    break;
                case 'Martial Melee':
                    $items = Item::where('category', 'Martial Melee')->get();
                    break;
                case 'Martial Ranged':
                    $items = Item::where('category', 'Martial Ranged')->get();
                    break;
                default:
                    $items = Item::all();
                    break;
            }
        }
        return view('admin.items.index', compact('items', 'category'));
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
            $path = Storage::put('uploads', $formData['image']);
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
        return to_route('admin.items.index')->with('message', "Il prodotto : '$item->name' è stato eliminato");
    }
}
