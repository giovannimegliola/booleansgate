@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Create new character</h1>
        <form action="{{ route('admin.characters.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
     <div class="mb-3">
            <label for="title">Name</label>
            <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                required minlength="3" maxlength="200" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>

    <div class="mb-3">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10">{{ old('description') }}
        </textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="attack">Attack</label>
        <textarea class="form-control @error('attack') is-invalid @enderror" name="attack" id="attack" cols="30" rows="10">{{ old('attack') }}
        </textarea>
        @error('attack')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="defence">Defense</label>
        <textarea class="form-control @error('defence') is-invalid @enderror" name="defence" id="defence" cols="30" rows="10">{{ old('defence') }}
        </textarea>
        @error('defence')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="speed">Speed</label>
        <textarea class="form-control @error('speed') is-invalid @enderror" name="speed" id="speed" cols="30" rows="10">{{ old('speed') }}
        </textarea>
        @error('speed')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="life">Life</label>
        <textarea class="form-control @error('life') is-invalid @enderror" name="life" id="life" cols="30" rows="10">{{ old('life') }}
        </textarea>
        @error('life')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex">
        <div class="me-3">
            <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
        </div>
        <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{old('image')}}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </div>

        </form>
    </section>
@endsection
