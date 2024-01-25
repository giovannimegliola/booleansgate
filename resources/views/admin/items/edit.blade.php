@extends('layouts.app')
@section('content')
    <main id="items-edit">
        <section class="container w-50">
            <h1 class="my-3">Edit Item</h1>
            <form action="{{route('admin.items.update', $item->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        required maxlength="200" minlength="3" value="{{old('name', $item->name)}}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                          cols="30" rows="10">{{old('description', $item->description)}}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 w-50">
                    <label for="category">Category</label>
                    <input class="form-control @error('category') is-invalid @enderror" name="category" id="category"
                          cols="30" rows="10" value="{{old('category', $item->category)}}">
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 w-50">
                    <label for="type">Type</label>
                    <input class="form-control @error('type') is-invalid @enderror" name="type" id="type"
                          cols="30" rows="10" value="{{old('type', $item->type)}}">
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 w-50">
                    <label for="weight">Weight</label>
                    <input class="form-control @error('weight') is-invalid @enderror" name="weight" id="weight"
                          cols="30" rows="10" value="{{old('weight', $item->type)}}">
                    @error('weight')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 w-50">
                    <label for="cost">Cost</label>
                    <input class="form-control @error('cost') is-invalid @enderror" name="cost" id="cost"
                          cols="30" rows="10" value="{{old('cost', $item->cost)}}">
                    @error('cost')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex">
                        <div class="me-3">
                            <img id="uploadPreview" width="100" src='{{$item->image ? asset('storage/' . $item->image) : "https://via.placeholder.com/300x200"}}'>
                        </div>
                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                id="image" value="{{ old('image', $item->image) }}">
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
    </main>
@endsection