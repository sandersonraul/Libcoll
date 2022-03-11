
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit user</h1>
@stop

@section('content')

<form class="row g-3" action="{{ route('update_user', ['id' => $user->id]) }}" method="POST">
  @csrf
  <div class="form-group col-md-4">
    <label for="title" class="form-label">Title</label>
    <input id="title" name="title" type="text" class="form-control" value="{{ $user->name  }}">
  </div>

  <div class="form-group col-md-4">
    <label for="author" class="form-label">Author</label>
    <input id="author" name="author" type="text" class="form-control" value="{{ $user->email  }}">
  </div>

  <div class="form-group col-md-4">
    <label for="isbn" class="form-label">ISBN</label>
    <input id="isbn" name="isbn" type="text" class="form-control" value="{{ $user->isbn  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="image" class="form-label">user Image</label>
    <input class="form-control" type="file" id="image" value="{{ $user->image  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="category" class="form-label">Category</label>
    <input id="category" name="category" type="text" class="form-control" value="{{ $user->category  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" rows="3"></textarea value="{{ $user->description  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="publishing_company" class="form-label">Publishing company</label>
    <input id="publishing_company" name="publishing_company" type="text" class="form-control" value="{{ $user->publishing_company  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="published_at" class="form-label">Published at</label>
    <input id="published_at" name="published_at" type="text" class="form-control" value="{{ $user->published_at  }}">
  </div>
  <div class="col-auto">
    <a href="{{ route('showAll') }}" class="btn btn-secondary" >Cancel</a>
</div>
  <button type="submit" class="btn btn-success">Save</button>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

