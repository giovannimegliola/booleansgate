@extends('layouts.app')

@section('content')
<main id="items-show">
    <section class="container">
        <div class="row py-5">
            <div class="col-4">
                <h1 class="text-center display-3 ">{{$item->name}}</h1>
                @if(!$item->image)
                    <img src="{{ Vite::asset('/public/image/' . $item->name . '.gif') }}" class="d-block w-100 fixed-size-image" alt="{{ $item->name }}">
                @else
                    <img src="{{asset('storage/'. $item->image)}}" class="w-100 fixed-size-image" alt="{{ $item->name }}">
                @endif
            </div>
            <div class="col d-flex flex-column justify-content-center">
                <p class=" text-light fs-3 mx-5">Description: <br> {{$item->description}}</p>

                <div class=" d-flex fs-5 mx-5">
                    <span>Category:{{$item->category ? $item->category : 'Unknown'}}</span>
                    <span>Type: {{$item->type}}</span>
                    <span>Weight: {{$item->weight}}</span>
                    <span>cost: {{$item->cost}}</span>
                </div>
                <div class=" d-flex mx-5">
                    <a href="{{route('admin.items.edit', $item->id)}}" class="btn btn-light  fs-5 my-3">edit</a>

                    <form action="{{route('admin.items.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cancel-button btn btn-danger fs-5 my-3 mx-2 py-2 px-3" data-item-title="{{$item->name}}">delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

