
@extends('despevago.materialize')

@section('title', $user->first_name. ' '.$user->last_name)

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
    <div class="container">
        <hr>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <img width="300px" height="300px"/>
            </div>
            <div class="col-md-8 card">
                <div class="card-body">
                    <h2>{{$user->first_name}} {{$user->last_name}}</h2>
                    <strong>Email: </strong> {{$user->email}}<p></p>
                    <strong>Telephone:</strong> {{$user->telephone}}<p></p>
                    <strong>Balance</strong> {{$user->current_balance}}<p></p>
                    <a class="btn btn-md btn-success" href="{{ route('payment_methods.create') }}">Add payment method</a>
                    <a class="btn btn-md btn-success" href="{{ route('paymentForm') }}">Add credit</a>
                    <a class="btn btn-md btn-success" href="{{ route('user.history') }}">History</a>
                    <a class="btn btn-md btn-success" href="{{ route('/') }}">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection