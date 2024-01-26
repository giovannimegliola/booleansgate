@extends('layouts.app')

@section('title', 'Arenas')

@section('content')
<main id="arenas">
    <section class="container py-4 text-end">

        @if (session()->has('message'))
        <div class="d-flex justify-content-end">
            <div class="alert-delete">
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            </div>
        </div>
        
        
        @endif
        <h1 class="text-center display-3 ">Arenas</h1>


        <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($arenas as $index => $arena)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($arenas as $index => $arena)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        @if(!$arena->image)
                        <img src="{{ Vite::asset('/public/image/' . $character->name . '.gif') }}" class="d-block w-100" alt="{{ $character->name }}">
                        @else
                        <img src="{{ asset('storage/' . $arena->image) }}" class="d-block w-100 h-100" alt="{{ $arena->name }}">
                        @endif
                        
                        <div class="carousel-caption d-none d-md-flex flex-column justify-content-between h-100 ">
                            <div>
                                <h3>{{ $arena->name }}</h3>
                            <div class="d-flex justify-content-end mb-4">

                                 <form action="{{route('admin.arenas.destroy', $arena->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cancel-button btn btn-danger mx-2" data-item-title="{{$arena->name}}"><i class="fa-solid fa-trash"></i></button>
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