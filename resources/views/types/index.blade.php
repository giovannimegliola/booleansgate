@extends('layouts.app')
@section('title', 'Types')
@section('content')
    <main>
        <section class="container py-4 ">
            <h1>Types</h1>
            <a href="{{ route('types.create') }}" class="btn btn-primary my-3">Create new Type</a>
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif
            <div class="row gy-4">
                @foreach ($types as $type)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card w-100 h-100">
                            <img src="" alt="{{ $type->name }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $type->name }}</h5>
                                <p class="card-text">{!! substr($type->desc, 0, 100) . '...' !!}</p>
                                <a href="{{ route('types.show', $type->id) }}" class="btn btn-primary">See details</a>
                                <form action="{{ route('types.destroy', $type->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="cancel-button btn btn-danger"
                                        data-item-title="{{ $type->name }}">Remove</button>
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
