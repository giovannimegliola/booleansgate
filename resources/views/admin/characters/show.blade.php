@extends('layouts.app')
@section('content')
    <section class="container" id='characters_index'>
        <h1>{{$character->name}}</h1>
        <p>{{$character->description}}</p>
        <span>{{$character->type ? $character->type->name : 'Unknown'}}</span>
        {{-- $post->category?->name --}}
    </section>
@endsection