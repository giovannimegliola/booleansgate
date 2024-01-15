<?php

namespace App\Http\Controllers\Admin;

use App\Models\Character;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {
<<<<<<< HEAD:app/Http/Controllers/CharacterController.php

        $formData = $request->validated();
        //CREATE SLUG
        //$slug = Character::getSlug($formData['name']);
        //add slug to formData
        //$formData['slug'] = $slug;
        //prendiamo l'id dell'utente loggato
        //$userId = Auth::id();
        //dd($userId);
        //aggiungiamo l'id dell'utente
        //$formData['user_id'] = $userId;
        if ($request->hasFile('image')) {
            $path = Storage::put('images', $formData['image']);
            $formData['image'] = $path;
        }
        $character = Character::create($formData);
        return redirect()->route('admin.characters.show', $character->id);
=======
        $form_data = $request->validated();
        $newCharacter = Character::create($form_data);
        return to_route('admin.characters.show', $newCharacter->id);
>>>>>>> main:app/Http/Controllers/Admin/CharacterController.php
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
        return view('admin.characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {
<<<<<<< HEAD:app/Http/Controllers/CharacterController.php


        $formData = $request->validated();
        // if ($character->title !== $formData['title']) {
        //     //CREATE SLUG
        //     $slug = Character::getSlug($formData['name']);
        // }
        //add slug to formData
        //$formData['slug'] = $slug;
        //aggiungiamo l'id dell'utente proprietario del post
        //$formData['user_id'] = $post->user_id;
        if ($request->hasFile('image')) {
            if ($character->image) {
                Storage::delete($character->image);
            }

            $path = Storage::put('images', $formData['image']);
            $formData['image'] = $path;
        }
        $character->update($formData);
        return redirect()->route('admin.characters.show', $character->id);
=======
        $form_data = $request->validated();
        $character->fill($form_data);
        $character->update();
        return to_route('admin.characters.show', $character->id);
>>>>>>> main:app/Http/Controllers/Admin/CharacterController.php
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
