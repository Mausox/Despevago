@extends('despevago.app')

@section('title','Index transfer')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')
<div class="container">
    <h1>Transfers</h1>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{ session('success')}}</p>
        </div>
    @endif
    <hr>
    <a class="btn btn-sm btn-success" href="{{ route('transfers.create') }}">Create</a>
    <div class="row">
        @foreach($transfers as $transfer)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p>Start date: {{$transfer->start_date}}</p>
                        <p>Start hour: {{$transfer->start_hour}}</p>
                        <p>Hotel: {{$transfer->hotel->name}}</p>
                        <p>Airport: {{$transfer->airport->name}}</p>
                        <p>Route: {{$transfer->route}}</p>
                        <p>price: {{$transfer->price}}</p>
                        <a class="btn btn-sm btn-success" href="{{ route('transfers.show', $transfer->id) }}">Show</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('transfers.edit', $transfer->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['transfers.destroy', $transfer->id]])!!}
                        {!! Form::button('DELETE', ['type' => 'submit','class' => 'btn btn-sm btn-red']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

