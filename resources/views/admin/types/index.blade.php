@extends('layouts.app')
@section('title', 'Types')
@section('content')
    <main>
        <section class="container py-5">

            @if (session()->has('message'))
                <div class="alert alert-success ">
                    {{ session('message') }}
                </div>
            @endif
            <a href="{{ route('admin.types.create') }}" class="btn btn-primary my-3">Create a new type</a>
            <h1 class="text-light py-3">List types</h1>
            <div class="row gy-4">
                @foreach ($types as $type)
                    <div class="col-12 col-md-4 col-lg-2">
                        <div class="card bg-trasparent text-light border-1 border-light h-100">
                            <div class="card-body d-flex flex-column justify-content-between ">
                                <h5 class="card-title">{{ $type->name }}</h5>
                                <h6>name:{{ $type->name }}</h6>
                                <p class="card-text">{!! substr($type->desc, 0, 100) . '...' !!}</p>
                                <a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-primary">Vedi
                                    dettaglio</a>
                                <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-secondary">Modifica</a>
                                <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="cancel-button btn btn-danger"
                                        data-type-title="{{ $type->name }}">Cancella</button>
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
