@extends('layouts.app')
@section('title', 'Types')
@section('content')
    <main id="types">
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <section class="container-fluid py-5 text-center">
            <button class="btn btn-primary my-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Create new Type</button>

            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Create a Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form action="{{route('admin.types.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="desc" name="desc" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <table class="table w-75 m-auto">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th class="text-center" scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                    <tr>
                        <th scope="row">
                            {{ $type->id}}
                        </th>
                        <td>
                            {{ $type->name}}
                        </td>
                        <td>
                            {{ substr($type->desc, 0, 50) . '...'}}
                        </td>
                        <td class="d-flex justify-content-center align-items-center">
                            <form action="{{route('admin.types.destroy', $type->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cancel-button btn btn-danger mx-2" data-item-title="{{$type->name}}"><i class="fa-solid fa-trash"></i></button>
                            </form>
                            <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"> <i class="fa-solid fa-pen"></i></button>

                            <div class="offcanvas offcanvas-start text-bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
                                        Edit
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <form action="{{route('admin.types.update', $type->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="desc" class="form-label">Description</label>
                                            <textarea type="text" class="form-control" id="desc" name="desc" rows="20"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="w-50 m-auto py-3">
                {{ $types->links('vendor.pagination.custom-bootstrap-5') }}
            </div>
        </section>
    </main>
@endsection
