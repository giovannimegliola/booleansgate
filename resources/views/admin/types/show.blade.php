@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="w-50">
            <img class="w-100" src="{{ asset('storage' . $type->image) }}" alt="{{ $type->name }}">
        </div>

    </section>
@endsection
