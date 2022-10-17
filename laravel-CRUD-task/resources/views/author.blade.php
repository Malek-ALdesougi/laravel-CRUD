@extends('layout.master')


@section('table')
   
    <h1> {{$author[0]->author}}</h1>

@foreach ($author as $item)
<ul>

   <li>{{$item->book_title}}</li>
</ul>

@endforeach

@endsection