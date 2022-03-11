
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>New Book</h1>
@stop

@section('content')
<form class="row g-3" action="{{ route('save_user') }}" method="POST">
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
    <label for="userType" class="form-label">user type</label>
    <input id="userType" name="userType" type="text" class="form-control" :value="old('userType')" required>
  </div>

  <div class="form-group col-md-6">
    <label for="password" class="form-label">Password</label>
    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
  </div>
  
  <button type="submit" class="btn btn-success">Save</button>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
