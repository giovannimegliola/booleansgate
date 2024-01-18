@extends('layouts.app')
@section('content')
    <section class="container" id='characters_index'>
        <h1>{{$character->name}}</h1>
        <p>{{$character->description}}</p>
        <span>{{$character->type ? $character->type->name : 'Unknown'}}</span>
        @foreach ($character->items as $item)
            <div class="badge rounded-pill text-bg-success">{{$item->name}}</div>
        @endforeach
        {{-- $post->category?->name --}}
    </section>
@endsection