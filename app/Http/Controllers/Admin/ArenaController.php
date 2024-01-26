<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arena;
use App\Http\Requests\StoreArenaRequest;
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
     * Remove the specified resource from storage.
     */
    public function destroy(Arena $arena)
    {
        if ($arena->image) {
            Storage::delete($arena->image);
        }
        $arena->delete();
        return to_route('admin.arenas.index')->with('message', "The arena : '$arena->name' has been deleted");
    }
}
