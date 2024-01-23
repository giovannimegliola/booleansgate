<?php

namespace App\Http\Controllers\Admin;

use App\Models\Character;
use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();
        return view("admin.characters.index", compact("characters"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $items = Item::all();
        return view('admin.characters.create', compact('types', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {
        $formData = $request->validated();
        if ($request->hasFile('image')) {
            $path = Storage::put('images', $formData['image']);
            $formData['image'] = $path;
        }
        $newCharacter = Character::create($formData);
        if ($request->has('items')) {
            $newCharacter->items()->attach($request->items);
        }
        return to_route('admin.characters.show', $newCharacter->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('admin.characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        $types = Type::all();
        $items = Item::all();
        return view('admin.characters.edit', compact('character', 'types', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {

        $form_data = $request->validated();
        if ($request->hasFile('image')) {
            if ($character->image) {
                Storage::delete($character->image);
            }

            $path = Storage::put('images', $form_data['image']);
            $form_data['image'] = $path;
        }
        $character->fill($form_data);
        $character->update();
        if ($request->has('items')) {
            $character->items()->sync($request->items);
        } else {
            $character->items()->detach();
        }
        return to_route('admin.characters.show', $character->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        if ($character->image) {
            Storage::delete($character->image);
        }

        $character->delete();
        return to_route('admin.characters.index')->with('message', "$character->name è stato cancellato!");
    }
}
