<?php

namespace App\Http\Controllers;

use App\Models\Character;
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
        return view("characters.index", compact("characters"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {

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
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        return view('characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {


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
        return to_route('characters.index')->with('message', "$character->name è stato cancellato!");
    }
}
