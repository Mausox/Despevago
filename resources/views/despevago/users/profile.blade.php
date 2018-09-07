
@extends('despevago.materialize')

@section('title', $user->first_name. ' '.$user->last_name)

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col s12 m6 l3">
            <div class="card-panel valign-wrapper center-align ">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="materialboxed" width="200" src="{{ asset('img/profile.png') }}">
                </div>
            </div>
        </div> 
        <div class="col s12 m6 l9">
            <div class="card-panel">
                <div class="card-body">
                    <h5>{{$user->first_name}} {{$user->last_name}}</h5>
                    <strong>Email: </strong> {{$user->email}}<p></p>
                    <strong>Telephone:</strong> {{$user->telephone}}<p></p>
                    <strong>Balance</strong> {{$user->current_balance}}<p></p>
                    <a class=" blue darken-4 waves-effect waves-light btn-small" href="{{ route('payment_methods.create') }}">Add payment method</a>
                    <a class=" blue darken-4 waves-effect waves-light btn-small" href="{{ route('paymentForm') }}">Add credit</a>
                    <a class=" blue darken-4 waves-effect waves-light btn-small" href="{{ route('user.history') }}">History</a>
                    <a class=" blue darken-4 waves-effect waves-light btn-small" href="{{ route('/') }}">Back</a>
                </div>
            </div>    
        </div>
    </div>    
</div>    
@endsection