@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="w-50">
            <img class="w-100" src="{{ asset('storage' . $item->image) }}" alt="{{$item->name}}">
        </div>
        
    </section>
@endsection