
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Book Management</h1>
@stop

@section('content')
<a href="{{ route('new_book') }}" class="btn btn-success mb-3">New Book</a>

<div class="table-responsive">
<table id="books" class="table" style="width:100%">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">ISBN</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Publishing company</th>
            <th scope="col">Amount</th>
            <th scope="col">Published at</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->isbn}}</td>
            <td>{{$book->category}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->publishing_company}}</td>
            <td>{{$book->amount}}</td>
            <td>{{$book->published_at}}</td>
            <td>
                <?php if($book->status == 1){ ?>
                    <div class="badge bg-success"> Available</div>
                <?php } else { ?>
                    <div class="badge bg-danger"> Unavailable</div>
                <?php } ?>
            </td>
            <td>
                <a href="{{ route('edit_book', ['id'=>$book->id]) }}" class="btn btn-info">Edit</a>
                <a href="{{ route('destroy_book', ['id'=>$book->id]) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
