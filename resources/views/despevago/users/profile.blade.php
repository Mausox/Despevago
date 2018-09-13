@extends('despevago.materialize')

@section('title', $user->first_name. ' '.$user->last_name)

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    @if(Session::has('status'))
    <div class="materialert success">
        <div class="material-icons">check</div>
        {{ session('status')}}
    </div>
    @endif
        <div class="row mt-5">
            <div class="col s12 m12 l12">
                <div class="card horizontal valign-wrapper">
                    <div class="card-image pad-5 center-align">
                        <img class="profile-img" src="{{ asset('img/profile.png') }}">
                    </div>
                    <div class="card-content mb-5">
                        <h5 class="mt-0">{{$user->first_name}} {{$user->last_name}}
                            <a class="icon-black" href="{{ route('users.edit', $user->id) }}">
                                    <li class="material-icons">edit</li>
                                </a>
                        </h5>
                        <p><li class="material-icons left">email</li>{{$user->email}}</p>
                        <br>
                        <p><li class="material-icons left">phone</li>{{$user->telephone}}</p>
                        <br>
                        <p><li class="material-icons left">home</li>{{$user->address}}</p>
                        <br>
                        <p><li class="material-icons left">attach_money</li>{{$user->current_balance}}</p>
                    </div>
                </div>
                <div class="card-panel">
                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="col s3 m3 l3">
                                <a class="blue darken-4 waves-effect waves-light btn-small" href="{{ route('/') }}"><i class="icon-center material-icons left">keyboard_arrow_left</i>Back</a>
                            </div>
                            <div class="col s9 m9 l9 rigth-align">
                                <a class=" blue darken-4 waves-effect waves-light btn-small" href="{{ route('payment_methods.create') }}"><i class="icon-center material-icons left">payment</i>Add a Card</a>
                                <a class=" blue darken-4 waves-effect waves-light btn-small" href="{{ route('paymentForm') }}"><i class="icon-center material-icons left">account_balance</i>Add credit</a>
                                <a class=" blue darken-4 waves-effect waves-light btn-small" href="{{ route('user.history') }}"><i class="icon-center material-icons left">history</i>History</a>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>    
        </div>
    </div>
@endsection