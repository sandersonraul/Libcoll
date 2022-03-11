
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Book Management</h1>
@stop

@section('content')
<a href="{{ route('new_book') }}" class="btn-dark btn-sm">
    <i class="fa fa-plus"></i> New Book
</a>

<div class="table-responsive card-body d-flex justify-content-center">
<table id="books" class="table table-hover" style="width:90%">
    <thead>
        <tr>
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
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->category}}</td>
            <td>{{$book->publishing_company}}</td>
            <td>{{$book->published_at}}</td>
            <td>
                <?php if($book->status == 1){ ?>
                    <div class="badge bg-success"> Available</div>
                <?php } else { ?>
                    <div class="badge bg-danger"> Unavailable</div>
                <?php } ?>
            </td>
            <td>
                <a href="{{ route('show_book', ['id'=>$book->id]) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                <a href="{{ route('edit_book', ['id'=>$book->id]) }}" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                <a href= "{{ route('destroy_book', ['id'=>$book->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                <a href= "{{ route('destroy_book', ['id'=>$book->id]) }}" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">delete</button>
      </div>
    </div>
  </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@stop

@section('js')
@stop
