
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Book</h1>
@stop

@section('content')

<div class="container">
    <div class="card">
    <form class="row g-3 card-body" action="{{ route('update_book', ['id' => $book->id]) }}" method="POST">
  @csrf
  <div class="form-group col-md-6">
    <label for="title" class="form-label">Title</label>
    <input id="title" name="title" type="text" class="form-control" value="{{ $book->title  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="author" class="form-label">Author</label>
    <input id="author" name="author" type="text" class="form-control" value="{{ $book->author  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="isbn" class="form-label">ISBN</label>
    <input id="isbn" name="isbn" type="text" class="form-control" value="{{ $book->isbn  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="image" class="form-label">Book Image</label>
    <input class="form-control" type="file" id="image" value="{{ $book->image  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="category" class="form-label">Category</label>
    <input id="category" name="category" type="text" class="form-control" value="{{ $book->category  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" rows="3"></textarea value="{{ $book->description  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="publishing_company" class="form-label">Publishing company</label>
    <input id="publishing_company" name="publishing_company" type="text" class="form-control" value="{{ $book->publishing_company  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="published_at" class="form-label">Published at</label>
    <input id="published_at" name="published_at" type="text" class="form-control" value="{{ $book->published_at  }}">
  </div>
  <div class="col-auto">
    <a href="{{ route('showAll') }}" class="btn btn-secondary" >Cancel</a>
</div>
  <button type="submit" class="btn btn-success">Save</button>
</form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

