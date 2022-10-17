@extends('layout.master')

@section('title', 'Home page')

@section('logo', 'Books')


@section('table')
    <h1 class="text-warning" style="text-align: center">Books Page </h1>
    <div class="container">

        <div class="search d-flex justify-content-between">
            <a href="addBook"><button class="btn btn-success mb-3">Add new BOOK</button></a>
            @if (Session::get('success', false))
                <div style="background-color: green;"><?php echo $data = Session::get('success'); ?></div>
            @endif
            <form action="/book/search" method="GET" class="d-flex mb-3" role="search">
                @csrf
                <input name="search_book" class=" me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>

        <table class="table table-dark border-warning table-striped" style="text-align: center">
            <tbody>
                <thead>
                    <th>id</th>
                    <th>Book name</th>
                    <th>description</th>
                    <th>author</th>
                    <th>image</th>
                    <th>Action</th>
                    <th>Action</th>
                </thead>

                @foreach ($allBooks as $Book)
                    <tr>
                        <td>{{ $Book['id'] }}</td>
                        <td>{{ $Book['book_title'] }}</td>
                        <td>{{ $Book['description'] }}</td>
                        <td><a href="author/{{{$Book['author']}}}" style="text-decoration:none; color:white">{{ $Book['author'] }}</a></td>
                        <td><img height="60px" width="60px" src="{{ asset('/storage/' . $Book->image) }}" alt="None">
                        </td>
                        <td><a href="edit/{{ $Book['id'] }}"><button class="btn btn-success">Edit</button></a></td>
                        <td>
                            <form action="delete/{{ $Book['id'] }}" method="post"
                                onsubmit="return confirm('Do you really want to delete this book !?')">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger delete" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

@endsection
