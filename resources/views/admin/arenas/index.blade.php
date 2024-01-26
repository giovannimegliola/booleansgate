@extends('layouts.app')

@section('title', 'Arenas')

@section('content')
<main id="arenas">
    <section class="container py-4 text-center">

        @if (session()->has('message'))
        <div class="d-flex justify-content-center mt-4">
            <div class="alert-delete">
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            </div>
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button class="btn btn-danger my-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Create Arenas</button>

        <h1 class="text-center display-3 ">Arenas</h1>

        <div class="offcanvas offcanvas-bottom text-bg-dark h-50" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Create Arena</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form class="w-50 m-auto" action="{{route('admin.arenas.store')}}" method="POST">
                @csrf
                <div class="mb-3 mx-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3 mx-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </form>
        </div>
        </div>


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
                        <img src="{{ asset('storage/' . $arena->image) }}" class="d-block  h-100" alt="{{ $arena->name }}">
                        @endif
                        
                        <div class="carousel-caption d-none d-md-flex flex-column justify-content-between h-100 ">
                            <div>
                                <h3 class="pt-3">{{ $arena->name }}</h3>
                            <div class="d-flex justify-content-center mb-4">

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