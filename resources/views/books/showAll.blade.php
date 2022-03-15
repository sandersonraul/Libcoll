
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
<div id="alert" class="alert alert-primary" role="alert">
<button type="button" class="close" data-dismiss="alert">x</button>
{{ session('success') }}
</div>
@endif
<div class="table-responsive card-body d-flex justify-content-center">

<table id="books" class="table table-hover" style="width:90%">
    <thead>
        <tr>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Publishing company</th>
            <th scope="col">Published at</th>
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
            <td>{{$book->category}}</td>
            <td>{{$book->publishing_company}}</td>
            <td>{{$book->published_at->format('d-m-Y')}}</td>
            <td>
                <?php if($book->status == 1){ ?>
                    <div class="badge bg-success"> Available</div>
                <?php } else { ?>
                    <div class="badge bg-secondary"> Unavailable</div>
                <?php } ?>
            </td>
            <td>
                <a href="{{ route('show_book', ['id'=>$book->id]) }}" class="btn-info btn-sm"><i class="bi bi-eye"></i></a>
                <a href="{{ route('edit_book', ['id'=>$book->id]) }}" class="btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                <a class="btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-trash-fill"></i></a>
            </td>
        </tr>
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
      <h5 class="text-center">Are you sure you want to delete this book ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{ route('destroy_book', ['id'=>$book->id]) }}" class="btn btn-danger">delete</a>
      </div>
    </div>
  </div>
</div>
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
