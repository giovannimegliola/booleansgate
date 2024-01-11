@extends('layouts.app')

@section('title', 'Comics')

@section('content')
<main id="card-content">
    <section class="container py-5" >

        @if (session()->has('message'))
        <div class="alert alert-success ">
            {{session('message')}}
        </div>
        @endif
        <a href="{{ route('items.create') }}" class="btn btn-primary my-3">Create a new item</a>
        <h1 class="text-light py-3">List Items</h1>
        <div class="row gy-4">
          @foreach ($itemss as $item)
            <div class="col-12 col-md-4 col-lg-2">
                <div class="card bg-trasparent text-light border-1 border-light h-100">
                    <div class="card-body d-flex flex-column justify-content-between ">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <h6>slug:{{$item->slug}} | category:{{$item->category}} | type:{{$item->type}}</h6>
                        <span>weight:{{$item->weight}} </span> <span>cost: {{$item->cost}}</span>
                        <p class="card-text">{!! substr($item->description, 0, 100) . '...' !!}</p>
                        <a href="{{route('items.show', $item->id)}}" class="btn btn-primary">Vedi dettaglio</a>
                        <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-secondary">Modifica</a>
                        <form action="{{route('comics.destroy',$comic->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cancel-button btn btn-danger" data-item-title="{{$comic->title}}">Cancella</button>
                        </form>

                    </div>
                </div>
            </div>

          @endforeach
        </div>

    </section>
</main>

@endsection
