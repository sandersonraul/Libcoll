
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Book lending</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <form class="row g-3 card-body" action="{{ route('save_lending') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-6">
        <label for="user_id">User</label>
        <select name="user_id" id="userType" class="form-control">
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{$user->name}}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group col-md-6">
        <label for="book_id">Book</label>
        <select name="book_id" id="book_id" class="form-control">
            @foreach($data as $row)
            <option value="{{ $row->id }}">{{$row->title}}</option>
            @endforeach
        </select>
        </div>
        <br>
        <div class="col-auto">
            <a href="{{ route('lendings_index') }}" class="btn btn-secondary" >Cancel</a>
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
