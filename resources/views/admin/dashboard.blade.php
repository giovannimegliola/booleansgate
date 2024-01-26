@extends('layouts.app')

@section('content')
<div class="container-fluid" id="dash">
    <h2 class="display-5 fw-bold text-center pt-5 mb-5">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-around align-items-center flex-wrap">
        <div class="col-5">
            <canvas width="500" height="250" id="chartColumn"></canvas>
        </div>
        <div class="col-5">
            <canvas width="500" height="250" id="chartTension"></canvas>
        </div>
        <div class="col-8 mt-5 position-relative">
            <table class="table table-dark table-hover table-borderless fs-5">
                <thead class="table-success">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Attack</th>
                        <th scope="col">Defence</th>
                        <th scope="col">Speed</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($characters as $character)
                    <tr>
                        <th scope="row">
                            <a href="{{route('admin.characters.show', $character->id)}}" class="logo-container m-auto">
                                {{$character->name}}
                            </a>
                        </th>
                        <td>{{$character->attack}}</td>
                        <td>
                            {{$character->defence}}
                        </td>
                        <td>
                            {{$character->speed}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="py-3">
                {{ $characters->links('vendor.pagination.custom-bootstrap-5') }}
            </div>
        </div>
        <div class="col-3 mt-4">
            <canvas width="500" height="150" id="chartPie"></canvas>
        </div>
    </div>
</div>
@endsection
