
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users Management</h1>
@stop

@section('content')
<a href="{{ route('new_user') }}" class="btn-dark btn-sm">
    <i class="fa fa-plus"></i> New User
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
<table id="users" class="table table-hover" style="width:90%">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">userType</th>
            <th scope="col">actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            @if(Auth::user()->userType == 'librarian')
                @if($user->userType == 'user')
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->userType }}</td>
                        <td>
                            <a href="{{ route('show_user', ['id'=>$user->id]) }}" class="btn-info btn-sm"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('edit_user', ['id'=>$user->id]) }}" class="btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                            <a href="{{route('delete_user', ['id'=>$user->id])}}" onclick="return confirm('Are you sure?')" class="btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                @endif
            @else
                @if($user->userType != 'admin')
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->userType }}</td>
                    <td>
                        <a href="{{ route('show_user', ['id'=>$user->id]) }}" class="btn-info btn-sm"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('edit_user', ['id'=>$user->id]) }}" class="btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <a href="" onclick="return confirm('Are you sure?')" class="btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
                @endif
            @endif
        @endforeach
    </tbody>
</table>
</div>
<div class="d-flex justify-content-center">
{{$users->links()}}
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
