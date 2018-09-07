@extends('despevago.materialize')

@section('title', 'Transfer result')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    <hr>
    <div class="row">
        <div class="col-md-4">
            <img width="300px" height="300px"/>
        </div>
        <div class="col-md-8 card">
            <div class="card-body">
                <h2>Transfer id: {{$transfer->id}}</h2>
                <strong>Start date: </strong> {{$transfer->start_date}}<p></p>
                <strong>Start hour: </strong> {{$transfer->start_hour}}<p></p>
                <strong>Route:</strong> {{$transfer->route}}<p></p>
                <strong>Number of people:</strong> {{$transfer->number_people}}<p></p>
                <strong>Price</strong> {{$transfer->price}}<p></p>
                <strong>Hotel: </strong>{{$transfer->hotel->name}}<p></p>
                <strong>Hotel address: </strong>{{$transfer->hotel->address}}<p></p>
                <strong>Airport: </strong>{{$transfer->airport->name}}<p></p>
                <strong>Airport address: </strong>{{$transfer->airport->address}}<p></p>
                <a class="btn btn-md btn-success" href="{{ route('transfers.index') }}">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection



