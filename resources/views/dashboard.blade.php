@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
<div class="container-fluid">
        @can('is_admin')
        <h3>Dashboard</h3>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $user_counters->all_users }}</h3>
                            <p>All users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>{{ $books }}</h3>
                            <p>All Books</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $user_counters->librarian_users }}</h3>
                            <p>Librarians</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $user_counters->users }}</h3>
                            <p>Common users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
            @endcan
</div>
@if(count($bookings) != 0)
<br>
<h3>Requested Books</h3>
@endif
<div class="container-fluid">
    <div class="row">
        @foreach($bookings as $booking)
                <div class="col-sm-2">
                    <div class="card">
                    <div class="text-center"><img src="/images/books/{{ $booking->book->image }}" alt="{{ $booking->book->title }}" width="150"></div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$booking->book->title}}</h5>
                    </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
