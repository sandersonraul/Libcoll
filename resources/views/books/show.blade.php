
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a href="{{ route('showAll') }}" class="btn-dark btn-sm">
    <i class="fa fa-arrow-left"></i> Back
</a>
@stop

@section('content')

<div class="container d-flex justify-content-center">
    <div class="col-md-7">
        <div class="card card-secondary card-outline">
            <div class="card-body box-profile text-center">
                <h3 class="profile-username text-center">{{ $book->title }}</h3>
                <p class="text-muted text-center">{{ $book->author }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>ID: </b>{{ $book->id }}
                    </li>
                    <li class="list-group-item">
                        <b>ISBN: </b> {{ $book->isbn }}
                    </li>
                    <li class="list-group-item">
                        <b>Category: </b> {{ $book->category }}
                    </li>
                    <li class="list-group-item">
                        <b>Publishing company: </b>{{$book->publishing_company}}
                    </li>
                    <li class="list-group-item">
                        <b>Published at: </b>{{$book->published_at}}
                    </li>
                    <li class="list-group-item">
                        <b>Created At: </b>{{$book->created_at}}
                    </li>
                    <li class="list-group-item">
                        <b>Updated At: </b>{{$book->updated_at}}
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('edit_book', ['id'=>$book->id]) }}" class="btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('destroy_book', ['id'=>$book->id]) }}" onclick="return confirm('Are you sure?')" class="btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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
