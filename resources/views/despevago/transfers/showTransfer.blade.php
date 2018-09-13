@extends('despevago.materialize')

@section('title', 'Transfer result')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="row mb-0 pad-5">
            <a class="mt-3 blue darken-4 waves-effect waves-light btn-small" href="{{ route('transfer.search')}}"><i class="material-icons left">keyboard_arrow_left</i>Back</a>
        </div>
        <div class="col s12 m5 l6">
            <div class="card-panel">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="materialboxed" width="100%" height="100%" src="{{ asset('img/default/transfer_default.png') }}">
                </div>
            </div>
        </div>
        <div class="col s12 m5 l6">
            <div class="card-panel">
                <span class="card-title activator grey-text text-darken-4"><h4>{{ $transfer->name }}</h4></span>
                <p><i class="left material-icons">star</i>Classification: {{ $transfer->transfer_car()->first()->classification }}</p>
                <br>
                <p><i class="left material-icons">date_range</i> Date: {{ $transfer->start_date }}</p>
                <br>
                <p><i class="left material-icons">access_time</i> Hour: {{ $transfer->start_hour }}</p>
                <br>
                <p><i class="left material-icons">attach_money</i> Price: {{ $transfer->price }}</p>
                <br>
                <p><i class="left material-icons">person</i> Capacity: {{ $transfer->transfer_car()->first()->capacity }}</p>

            </div>
        </div>
    </div>


    @if(Auth::check())
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <div class="card red darken-1">
                    <strong>Whooops!</strong>  {{$errors->first()}}<br>
                </div>
            </div>
        @endif
    <div class="row">
        <div class="card-panel">
            {!! Form::open(['method' => 'POST', 'route'=>['transferReservation']]) !!}
            <input type='hidden' name="transfer_id" value = "{{$transfer->id}}" class="form-control" />
            <span class="card-title activator grey-text text-darken-4"><h5>Reservation</h5></span>
            <div class="row">
                    <div class="form-group">
                        <strong> Number of people</strong>
                        <div class='input-group date' id='number_people'>
                            <input type='number' name="number_people" class="form-control" min="1" max="{{$transfer->transfer_car->capacity}}"/>
                        </div>
                    </div>
            </div>

                <div class="row ">
                    <div class="col right">
                        {!! Form::button('Add to cart!', ['type' => 'submit', 'class' => 'blue darken-4 waves-effect waves-light btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            <x></x>
            @endif
        </div>
    </div>
</div>

@endsection



