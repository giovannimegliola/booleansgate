@extends('layouts.app')
@section('title', 'Types')
@section('content')
    <main id="types">
        <section class="container-fluid text-center">
            
            <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Create new Type</button>

            <h1 class="text-center display-3 py-4">Types</h1>


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
                        <input maxlength="100" required type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea required type="text" class="form-control" id="desc" name="desc" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>

            <table class="table table-dark table-hover table-borderless w-75 m-auto">
                <thead class="table-success fs-4">
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
                        <td class="testing fs-5 text-success">
                            {{ $type->name}}
                        </td>
                        <td class="cl-name position-relative">
                            <div class="desc">
                                {{ $type->desc}}
                            </div>
                            {{ substr($type->desc, 0, 50) . '...' }}
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
                                            <textarea type="text" class="form-control" id="desc" name="desc" rows="10"></textarea>
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

            @if ($errors->any())
               <div class="alert alert-danger w-50 m-auto my-4">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif

           @if (session()->has('message'))
            <div class="d-flex justify-content-center my-4">
                <div class="alert-delete">
                    <div class="alert alert-success">{{ session()->get('message') }}</div>
                </div>
            </div>
            @endif
        </section>
    </main>
@endsection
