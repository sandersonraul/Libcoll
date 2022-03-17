
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>bookings Management</h1>
@stop

@section('content')
<div class="table-responsive card-body d-flex justify-content-center">
<table id="users" class="table table-hover" style="width:90%">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Book ID</th>
            <th scope="col">Book</th>
            <th scope="col">Withdraw</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
        <tr>
            <td>{{ $booking->id}}</td>
            <td>{{ $booking->user_id}}</td>
            <td>{{ collect(explode(' ', $booking->user->name))->slice(0, 2)->implode(' ') }}</td>
            <td>{{ $booking->book_id}}</td>
            <td>{{ $booking->book->title }}</td>
            <td>{{ $booking->withdraw}}</td>
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
