
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users Management</h1>
@stop

@section('content')
<a href="{{ route('new_loan') }}" class="btn-dark btn-sm">
    <i class="fa fa-plus"></i> New Loan
</a>
<div class="table-responsive card-body d-flex justify-content-center">
<table id="users" class="table table-hover" style="width:90%">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User ID</th>
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
        @foreach ($loans as $loan)
            <tr>
            <td>{{ $loan->id}}</td>
            <td>{{ $loan->user_id}}</td>
            <td>{{ $loan->user->name }}</td>
            <td>{{ $loan->book->title }}</td>
            <td>{{ $loan->status}}</td>
            <td>{{ $loan->borrowed_at->format('Y-m-d')}}</td>
            <td>{{ $loan->devolution_date->format('Y-m-d')}}</td>
            <td>{{ $loan->returned_at}}</td>
            <td>
            @if($loan->status == 'in progress')
                <a href="{{ route('approve', ['id'=>$loan->id]) }}" class="btn-success btn-sm">Approve</a>
                <a href="{{ route('reject', ['id'=>$loan->id]) }}" class="btn-danger btn-sm">Reject</a>
            @elseif($loan->status == 'approved')
            <a href="{{ route('return_book', ['id'=>$loan->id]) }}" class="btn-info btn-sm">Return book</a>
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
