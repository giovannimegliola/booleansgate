@extends('layouts.app')

@section('title', 'Items')

@section('content')
<main id="items">
    <section class="container-fluid text-center">
        @if (session()->has('message'))
        <div class="d-flex justify-content-center mt-4">
            <div class="alert-delete">
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            </div>
        </div>
        @endif
        <a href="{{route('admin.items.create')}}" class="btn btn-danger fs-5 my-5">Create new Items</a>

        <div class="pb-5">
            <form class="d-flex justify-content-center align-items-end" action="{{route('admin.items.index')}}" method="GET">
                <div>
                    <label class="form-label text-light" for="category">
                        Search for Category
                    </label>
                    <select class="form-select text-center" name="category" id="category">
                        <option value="all">All</option>
                        <option {{ $category == "Simple Melee" ? 'selected ': '' }} value="Simple Melee">Simple Melee</option>
                        <option {{ $category == "Simple Ranged" ? 'selected ': '' }} value="Simple Ranged">Simple Ranged</option>
                        <option {{ $category == "Martial Melee" ? 'selected ': '' }} value="Martial Melee">Martial Melee</option>
                        <option {{ $category == "Martial Ranged" ? 'selected ': '' }} value="Martial Ranged">Martial Ranged</option>
                        </option>
                    </select>
                </div>
                <div class="px-4">
                    <label class="form-label text-light" for="name">
                        Search for Name
                    </label>
                    <input value="{{old('name', $name)}}" type="text" class="form-control text-center" name="name" id="name">
                </div>
                <button type="submit" class="btn btn-success mt-3">Search</button>
            </form>
        </div>

        <h1 class="text-center display-3 ">Items</h1>

        <div class="mb-5">
            <h2 class="text-danger">Results</h2>
            <p class="text-light">
                {{count($items)}} results found
            </p>
        </div>

        <div class="row justify-content-center">
            @foreach ($items as $item)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="my_slide">
                    <p class="my-3 py-3 description-text">{{ substr($item->description,0, 23) . '...' }}</p>
                    <div class="img_container">
                        @if(!$item->image)
                            <img src="{{ Vite::asset('/public/img/' . $item->name . '.gif') }}" class="d-block w-100" alt="{{ $item->name }}">
                            @else
                            <img class="w-100" src="{{ asset('storage/' . $item->image) }}" class="d-block w-100" alt="{{ $item->name }}">
                            @endif
                    </div>
                    <h3>{{$item->name}}</h3>
                     <div class="d-flex justify-content-center ">
                            <a href="{{ route('admin.items.show', $item->id) }}" class="btn btn-success mx-2 ">See details</a>

                                <form action="{{route('admin.items.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cancel-button btn btn-danger mx-2" data-item-title="{{$item->name}}"><i class="fa-solid fa-trash"></i></button>
                                </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</main>

@endsection
