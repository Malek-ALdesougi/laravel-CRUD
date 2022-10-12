@extends('layout.master')

@section('title', 'Home page')

@section('logo', 'Books')


@section('table')
    <h1 class="text-warning" style="text-align: center" >Books Page </h1>
    <table class="table table-dark border-warning table-striped" style="text-align: center">
        <tbody>
            <thead>
                <th>Book name</th>
                <th>description</th>
                <th>author</th>
                <th>image</th>
            </thead>

            @foreach ($allBooks as $Book)
                <tr>
                    <td>{{ $Book['title'] }}</td>
                    <td>{{ $Book['description'] }}</td>
                    <td>{{ $Book['author'] }}</td>
                    <td><img height="40px" width="40px" src="{{ $Book['image'] }}"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
