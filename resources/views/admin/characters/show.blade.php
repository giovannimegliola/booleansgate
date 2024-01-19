@extends('layouts.app')
@section('content')
<main id="characters-show">
     <section class="container" id='characters_index'>
        <div class="row py-5">
            <div class="col-4">
                <h1 class="text-center display-3 ">{{$character->name}}</h1>
        <img src="{{ Vite::asset('/public/image/' . $character->name . '.gif') }}" class="w-100" alt="{{ $character->name }}">
            </div>
            <div class="col d-flex flex-column justify-content-center">
                <p class=" text-light fs-3 mx-5 ">description: <br> {{$character->description}}</p>

                <div class=" d-flex fs-5 w-100 mx-5">
                    <span>Type:{{$character->type ? $character->type->name : 'Unknown'}}</span>
                    <span>Attack: {{$character->attack}}</span>
                    <span>Defence: {{$character->defence}}</span>
                    <span>Speed: {{$character->speed}}</span>
                    <span>Life: {{$character->life}}</span>
                </div>
                <div class=" d-flex mx-5">
                    <a href="{{route('admin.characters.edit', $character->id)}}" class="btn btn-light  fs-5 my-3">modifica</a>

                    <form action="{{route('admin.characters.destroy', $character->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cancel-button btn btn-danger fs-5 my-3 mx-2 py-2 px-3" data-item-title="{{$character->name}}">cancella</button>
                    </form>
                </div>

                @foreach ($character->items as $item)
                    <div class="badge rounded-pill text-bg-success">{{$item->name}}</div>
                @endforeach
            </div>
        </div>


        {{-- $post->category?->name --}}
    </section>
</main>

@endsection
