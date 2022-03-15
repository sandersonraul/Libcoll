
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>New Loan</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <form class="row g-3 card-body" action="{{ route('save_loan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-4">
        <label for="book_id">Book</label>
        <select name="book_id" id="userType" class="form-control">
            @foreach($data as $row)
            <option value="{{ $row->id }}">{{$row->title}}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group col-md-4">
            <label for="borrowed_at" class="form-label">borrowed_at</label>
            <input id="borrowed_at" name="borrowed_at" type="date" class="form-control">
        </div>

        <div class="form-group col-md-4">
            <label for="devolution_date" class="form-label">devolution_date</label>
            <input id="devolution_date" name="devolution_date" type="date" class="form-control">
        </div>
        <br>
        <div class="col-auto">
            <a href="" class="btn btn-secondary" >Cancel</a>
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
