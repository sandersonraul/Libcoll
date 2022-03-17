
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Lendings Management</h1>
@stop

@section('content')
<a href="{{ route('new_lending') }}" class="btn-dark btn-sm">
    <i class="fa fa-plus"></i> Lending a book
</a>
<div class="table-responsive card-body d-flex justify-content-center">
<table id="users" class="table table-hover" style="width:90%">
    <thead>
        <tr>
            <th scope="col">Lending ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Book</th>
            <th scope="col">Status</th>
            <th scope="col">borrowed_at</th>
            <th scope="col">devolution_date</th>
            <th scope="col">returned_at</th>
            <th scope="col">actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lendings as $lending)
            <tr>
            <td>{{ $lending->id}}</td>

            <td>{{ collect(explode(' ', $lending->user->name))->slice(0, 2)->implode(' ') }}</td>
            <td>{{ $lending->book->title }}</td>
            <td>{{ $lending->status}}</td>
            <td>{{ $lending->borrowed_at->format('Y-m-d')}}</td>
            <td>{{ $lending->devolution_date->format('Y-m-d')}}</td>
            <td>{{ $lending->returned_at}}</td>
            <td class="btn-group">
            @if($lending->status == 'borrowed')
            <a href="{{ route('return_book', ['id'=>$lending->id]) }}" class="btn-info btn-sm">Return book</a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@stop

@section('js')
@stop
