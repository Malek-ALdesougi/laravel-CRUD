@extends('layout.master')

@section('title', 'Home page')

@section('logo', 'Books')


@section('table')
    <h1 class="text-warning" style="text-align: center">Books Page </h1>
    <div class="container">
        <a href="addBook"><button class="btn btn-success mb-3">Add new BOOK</button></a>
        <table class="table table-dark border-warning table-striped" style="text-align: center">
            <tbody>
                <thead>
                    <th>Book name</th>
                    <th>description</th>
                    <th>author</th>
                    <th>image</th>
                    <th>Action</th>
                    <th>Action</th>
                </thead>

                @foreach ($allBooks as $Book)
                    <tr>
                        <td>{{ $Book['book_title'] }}</td>
                        <td>{{ $Book['description'] }}</td>
                        <td>{{ $Book['author'] }}</td>
                        <td><img height="60px" width="60px" src="{{ asset('/storage/'. $Book->image)}}" alt="None"></td>
                        <td><button class="btn btn-success">Edit</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
