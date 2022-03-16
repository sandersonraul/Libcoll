
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>New User</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
    <form class="row g-3 card-body" action="{{ route('save_user') }}" method="POST">
  @csrf
  <div class="form-group col-md-6">
    <label for="name" class="form-label">Name</label>
    <input id="name" name="name" type="text" class="form-control" :value="old('name')" required autofocus autocomplete="name">
  </div>

  <div class="form-group col-md-6">
    <label for="email" class="form-label">email</label>
    <input id="email" name="email" type="text" class="form-control" :value="old('email')" required>
  </div>
  <div class="form-group col-md-6">
      <label for="userType">User type?</label>
      <select name="userType" id="userType" class="form-control">
        @if(Auth::user()->userType == 'admin')
        <option value="user">User</option>
        <option value="librarian">Librarian</option>
        <option value="admin">Admin</option>
        @else
        <option value="user">User</option>
        @endif
      </select>
    </div>
  <div class="form-group col-md-6">
    <label for="password" class="form-label">Password</label>
    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
  </div>
  <br>
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

@section('js')
@stop
