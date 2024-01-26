@extends('layouts.app')
@section('content')
<main id="characters-create">
    <section class="container w-50">
        <h1>Create new character</h1>
        <form action="{{ route('admin.characters.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        {{-- Name --}}
     <div class="mb-3">
            <label class="text-light" for="title">Name</label>
            <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                required minlength="3" maxlength="200" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>
    {{-- Description --}}
    <div class="mb-3">
        <label class="text-light" for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="2" rows="4">{{ old('description') }}
        </textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Type --}}
    <div class="mb-3  ">
        <label class="text-light" for="type_id">Type</label>
        <select class="form-control w-25  @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
            <option value="">Seleziona un tipo</option>
            @foreach ($types as $type)
                <option value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected' : ''}}>{{$type->name}}</option>
            @endforeach
        </select>
        @error('type_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Items --}}
    <div class="mb-3">
        <div class="form-group">
            <h6 class="text-light">Seleziona items</h6>
            <div class="d-flex flex-wrap">
                @foreach ($items as $item)
                    <div class="col-md-3 text-light mx-3 form-check @error('items') is-invalid @enderror">
                        <input type="checkbox" class="form-check-input" name="items[]" value="{{ $item->id }}" {{ in_array($item->id, old('items', [])) ? 'checked' : '' }}>
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
        <label class="text-light" for="attack">Attack</label>
        <textarea class="form-control w-50 @error('attack') is-invalid @enderror" name="attack" id="attack" cols="2" rows="1">{{ old('attack') }}
        </textarea>
        @error('attack')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{--Defense --}}
    <div class="mb-3">
        <label class="text-light" for="defence">Defense</label>
        <textarea class="form-control w-50 @error('defence') is-invalid @enderror" name="defence" id="defence" cols="2" rows="1">{{ old('defence') }}
        </textarea>
        @error('defence')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Speed --}}
    <div class="mb-3">
        <label class="text-light" for="speed">Speed</label>
        <textarea class="form-control w-50 @error('speed') is-invalid @enderror" name="speed" id="speed" cols="2" rows="1">{{ old('speed') }}
        </textarea>
        @error('speed')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Life --}}
    <div class="mb-3">
        <label class="text-light" for="life">Life</label>
        <textarea class="form-control w-50 @error('life') is-invalid @enderror" name="life" id="life" cols="2" rows="1">{{ old('life') }}
        </textarea>
        @error('life')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Image --}}
    <div class="d-flex">
        <div class="me-3">
            <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
        </div>
        <div class="mb-3">
                <label class="text-light" for="image">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{old('image')}}">
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
