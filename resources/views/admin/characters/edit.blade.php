@extends('layouts.app')
@section('content')
    <main id="characters-edit">
        <section class="container w-50">
            <h1>Edit character</h1>
            @if ($errors->any())
                <div class="alert alert-danger w-50 m-auto my-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.characters.update', $character->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                {{-- Name --}}
                <div class="mb-3">
                    <label for="title">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" required minlength="3" maxlength="200" value="{{ old('name', $character->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Description --}}
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        cols="2" rows="4">{{ old('description', $character->description) }}
                    </textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Type --}}
                <div class="mb-3  ">
                    <label for="type_id">Type</label>
                    <select class="form-control w-25  @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                        <option value="">Seleziona un tipo</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id', $character->type_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Items --}}
                <div class="mb-3">
                    <div class="form-group">
                        <h6 class="text-white">Seleziona items</h6>
                        <div class="d-flex flex-wrap">
                            @foreach ($items as $item)
                                <div class="col-md-3 text-light mx-3 form-check @error('items') is-invalid @enderror">
                                    @if($errors->any())
                                    <input type="checkbox" class="form-check-input" name="items[]" value="{{ $item->id }}" {{ in_array($item->id, old('items', $character->items)) ? 'checked' : '' }}>
                                    @else
                                    <input type="checkbox" class="form-check-input" name="items[]" value="{{ $item->id }}" {{ $character->items->contains($item->id) ? 'checked' : '' }}>  
                                    @endif
                                    <label class="form-check-label">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
            
                        @error('items')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Attack --}}
                <div class="mb-3">
                    <label for="attack">Attack</label>
                    <input type="number" class="form-control w-50 @error('attack') is-invalid @enderror" name="attack" value="{{ old('attack', $character->attack) }}">
                    @error('attack')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Defense --}}
                <div class="mb-3">
                    <label for="defence">Defense</label>
                    <input type="number" required class="form-control w-50 @error('defence') is-invalid @enderror" name="defence" id="defence" value="{{ old('defence', $character->defence) }}">
                    @error('defence')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Speed --}}
                <div class="mb-3">
                    <label for="speed">Speed</label>
                    <input type="number" required class="form-control w-50 @error('speed') is-invalid @enderror" name="speed" id="speed" value="{{ old('speed', $character->speed) }}">
                    @error('speed')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Life --}}
                <div class="mb-3">
                    <label for="life">Life</label>
                    <input type="number" required class="form-control w-50 @error('life') is-invalid @enderror" name="life" id="life" value="{{ old('life', $character->life) }}">
                    @error('life')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Image --}}
                <div class="d-flex">
                    <div class="me-3">
                        <img id="uploadPreview" width="100" src='{{$character->image ? asset('storage/' . $character->image) : "https://via.placeholder.com/300x200"}}'>
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            id="image" value="{{ old('image', $character->image) }}">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </div>

            </form>
        </section>
    </main>
@endsection
