@extends('layout.master')

@section('title', 'Add Book')
@section('logo', 'Add Book')

@section('table')

<body style="background-image:url('https://i.pinimg.com/originals/67/18/22/671822c2f63dd5f65d8fd15c9710420b.jpg'); background-size:cover; background-repeat:no-repeat">
    

    <div style="width:400px; margin-top:50px" class="container bg-dark mt-20">
        <form class="w-20" action="{{ url('middel') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Book Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" name="Description" class="form-control" id="Description" placeholder="Description">
                @error('Description')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="Author">Author</label>
                <input type="text" name="Author" class="form-control" id="Author" placeholder="Author">
                @error('Author')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image" placeholder="image">
                @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="buttons" style="display: flex; justify-content:space-between">
                <button type="submit" class="btn btn-warning mt-3 mb-3">ADD</button>
                <a href="/home"><button type="button" class="btn btn-success mt-3 mb-3">BACK HOME</button></a>
            </div>
        </form>
    </div>
@stop
</body>
