
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Book Management</h1>
@stop

@section('content')
<a href="{{ route('new_book') }}" class="btn-dark btn-sm">
    <i class="fa fa-plus"></i> New Book
</a>

@if (session('success'))
<div class="d-flex justify-content-center">
    <div id="alert" class="alert alert-success" role="alert" style="width:50%;">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p style=" height:15px; font-size:1.2rem; padding:0;">{{ session('success') }}</p>
    </div>
</div>
@endif
<div class="table-responsive card-body d-flex justify-content-center">

<table id="books" class="table table-hover" style="width:90%">
    <thead>
        <tr>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td><img src="/images/books/{{ $book->image }}" alt="{{ $book->title }}" width="100"></td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>
                @if($book->status == 1)
                    <div class="badge bg-success"> Available</div>
                @elseif($book->status == 2)
                    <div class="badge bg-dark">Requested</div>
                @else
                    <div class="badge bg-secondary"> Unavailable</div>
                @endif
            </td>
            <td>
                <a href="{{ route('show_book', ['id'=>$book->id]) }}" class="btn-info btn-sm"><i class="bi bi-eye"></i></a>
                <a href="{{ route('edit_book', ['id'=>$book->id]) }}" class="btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                <a href="{{ route('destroy_book', ['id'=>$book->id]) }}" onclick="return confirm('Are you sure?')" class="btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
@stop
