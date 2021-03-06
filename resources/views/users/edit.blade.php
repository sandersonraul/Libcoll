
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit user</h1>
@stop

@section('content')

<div class="container">
    <div class="card">
    <form class="row g-3 card-body" action="{{ route('update_user', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group col-md-6">
    <label for="name" class="form-label">name</label>
    <input id="name" name="name" type="text" class="form-control" value="{{ $user->name  }}">
  </div>

  <div class="form-group col-md-6">
    <label for="email" class="form-label">email</label>
    <input id="email" name="email" type="text" class="form-control" value="{{ $user->email  }}">
  </div>
    @if(Auth::user()->userType=='admin')
        <div class="form-group col-md-6">
            <label for="userType">User type</label>
            <select name="userType" id="userType" class="form-control">
                <option value="admin" {{ $user->userType == 'admin' ? "selected='selected'" : "" }}>Admin</option>
                <option value="librarian" {{ $user->userType == 'librarian' ? "selected='selected'" : "" }}>Librarian</option>
                <option value="user" {{ $user->userType == 'user' ? "selected='selected'" : "" }}>User</option>
            </select>
        </div>
    @else
    <div class="form-group col-md-6">
    <label for="userType" class="form-label">User Type</label>
    <input id="userType" name="userType" type="text" class="form-control" value="{{ $user->userType  }}" readonly>
  </div>
    @endif

  <div class="form-group col-md-6">
    <label for="password" class="form-label">password</label>
    <input id="password" name="password" type="password" class="form-control">
  </div>

  <div class="col-auto">
    <a href="{{ route('showAllUsers') }}" class="btn btn-secondary" >Cancel</a>
</div>
  <button type="submit" class="btn btn-success">Save</button>
</form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

