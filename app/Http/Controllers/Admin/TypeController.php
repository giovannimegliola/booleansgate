<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $formData = $request->validated();
        if ($request->hasFile('image')) {
            $path = Storage::put('uploads', $formData['image']);
            $formData['image'] = $path;
        }
        $newType = Type::create($formData);
        return to_route('admin.types.show', $newType->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $formData = $request->validated();
        if ($request->hasFile('image')) {
            if ($type->image) {
                Storage::delete($type->image);
            }
            $path = Storage::put('uploads', $formData['image']);
            $formData['image'] = $path;
        }
        $type->fill($formData);
        $type->update();
        return to_route('admin.types.show', $type->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('types.index')->with('message', "$type->name è stato cancellato!");
    }
}
