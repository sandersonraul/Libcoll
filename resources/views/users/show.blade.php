
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a href="{{ route('showAllUsers') }}" class="btn-dark btn-sm">
    <i class="fa fa-arrow-left"></i> Back
</a>
@stop

@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-md-7" style="margin-top: 25px;">
        <div class="card card-secondary card-outline">
            <div class="card-body box-profile text-center">
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                <p class="text-muted text-center">{{ $user->userType }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>ID: </b>{{ $user->id }}
                    </li>
                    <li class="list-group-item">
                        <b>E-mail: </b> {{ $user->email }}
                    </li>
                    <li class="list-group-item">
                        <b>Created At: </b>{{$user->created_at}}
                    </li>
                    <li class="list-group-item">
                        <b>Updated At: </b>{{$user->updated_at}}
                    </li>
                    <li class="list-group-item">
                    <a href="" class="btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <a href="" onclick="return confirm('Are you sure?')" class="btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                    </li>

                </ul>
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
