@extends('layouts.app')

@section('title', 'Characters')

@section('content')
<main id="characters">
    <section class="container text-end">
        <a href="{{route('admin.characters.create')}}" class="btn btn-danger  fs-5 my-3">Create new Character</a>

        @if (session()->has('message'))
        <div class="d-flex justify-content-end">
            <div class="alert-delete">
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            </div>
        </div>
        
        
        @endif
        <h1 class="text-center display-3 ">Characters</h1>


        <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($characters as $index => $character)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($characters as $index => $character)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        @if(!$character->image)
                        <img src="{{ Vite::asset('/public/image/' . $character->name . '.gif') }}" class="d-block w-100" alt="{{ $character->name }}">
                        @else
                        <img src="{{ asset('storage/' . $character->image) }}" class="d-block w-100 h-100" alt="{{ $character->name }}">
                        @endif
                        
                        <div class="carousel-caption d-none d-md-flex flex-column justify-content-between h-100 ">
                            <div>
                                {{-- <p>{!! substr($character->description, 0, 100) . '...' !!}</p> --}}
                                <p class="my-3 fs-4 py-3 description-text">{{$character->description}}</p>
                            </div>
                            <div>
                                <h3>{{ $character->name }}</h5>
                            <div class="d-flex justify-content-center ">
                            <a href="{{ route('admin.characters.show', $character->id) }}" class="btn btn-success mx-2 ">See details</a>

                                 <form action="{{route('admin.characters.destroy', $character->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cancel-button btn btn-danger mx-2" data-item-title="{{$character->name}}"><i class="fa-solid fa-trash"></i></button>
                            </form>
                            </div>
                        </div>


                        </div>
                    </div>

                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
</main>


@endsection
