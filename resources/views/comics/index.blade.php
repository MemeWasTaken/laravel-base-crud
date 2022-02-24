@extends('layouts.base')

@section('documentTitle')
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                <h1 class="h1">Admin - All Comics</h1>
                <a href="{{ route('comics.create') }}" class="btn btn-secondary create">Add new Comic</a>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col mb-3">
                <a href="{{ route('comics.create') }}" class="btn btn-secondary">Add new comic</a>
            </div>
        </div> --}}
        <div class="row">
            <div class="col">
                 <table class="table table-striped table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th>Title</th>
                            <th>Author</th>
                            <th>Price</th>
                            <th class="d-flex justify-content-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($comics as $comic)
                        <tr>
                            <td>{{ $comic->title }}</td>
                            <td>{{ $comic->author }}</td>
                            <td>{{ $comic->price }} €</td>
                            <td class="d-flex justify-content-end">
                                <a class="btn btn-secondary me-1" href="{{ route('comics.show', $comic) }}">View</a>
                                <a class="btn btn-secondary ms-1" href="{{ route('comics.edit', $comic) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{ $comics->links() }}
            </div>
        </div>
    </div>
   
@endsection