<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $characters = Character::with('type')->paginate(3);
        return view('admin.dashboard', compact('characters'));
        ;
    }
}
