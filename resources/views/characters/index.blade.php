@extends('layouts.app')

@section('title', 'Characters')

@section('content')
<main>
    <section class="container py-4 ">
        <h1>Characters</h1>



        <a href="{{route('characters.create')}}" class="btn btn-primary my-3">Create new Character</a>

        @if (session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif

        <div class="row gy-4">
          @foreach ($characters as $character)
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card w-100 h-100">
                    <img src="" alt="{{$character->name}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$character->name}}</h5>
                        <p class="card-text">{!! substr($character->description, 0, 100) . '...' !!}</p>
                        <a href="{{route('characters.show', $character->id)}}" class="btn btn-primary">See details</a>
                        <form action="{{route('characters.destroy', $character->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cancel-button btn btn-danger" data-item-title="{{$character->name}}">Remove</button>
                        </form>

                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </section>
    {{-- @include('partials.modal_delete'); --}}
</main>

@endsection
