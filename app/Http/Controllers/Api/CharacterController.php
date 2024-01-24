<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::with('type')->get();
        return response()->json([
            'success' => true,
            'results' => $characters
        ]);
    }
    public function show($id)
    {
        $character = Character::with('type')->where('id', $id)->first();
        return response()->json([
            'success' => true,
            'results' => $character
        ]);
    }
}
