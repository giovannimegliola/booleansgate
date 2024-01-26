<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arena;
use App\Http\Requests\StoreArenaRequest;
use App\Http\Requests\UpdateArenaRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArenaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arenas = Arena::all();
        return view('admin.arenas.index', compact('arenas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArenaRequest $request)
    {
        $formData = $request->validated();
        $slug = Str::slug($formData['name'], '-');
        $formData['slug'] = $slug;
        if ($request->hasFile('image')) {
            $path = Storage::put('arenas', $formData['image']);
            $formData['image'] = $path;
        }
        $newArena = Arena::create($formData);
        return to_route('admin.arenas.index')->with('message', "The arena : '$newArena->name' has been added");
    }

    /**
     * Display the specified resource.
     */
    // public function show(Arena $arena)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Arena $arena)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArenaRequest $request, Arena $arena)
    {
        $formData = $request->validated();
        if ($request->hasFile('image')) {
            if ($arena->image) {
                Storage::delete($arena->image);
            }
            $path = Storage::put('arenas', $formData['image']);
            $formData['image'] = $path;
        }
        $arena->fill($formData);
        $arena->update();
        return to_route('admin.arenas.index')->with('message', "The arena : '$arena->name' has been modified");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arena $arena)
    {
        if ($arena->image) {
            Storage::delete($arena->image);
        }
        $arena->delete();
        return to_route('admin.items.index')->with('message', "The arena : '$arena->name' has been deleted");
    }
}
