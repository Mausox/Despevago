@extends('despevago.materialize')

@section('title', 'Show activity')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whooops!</strong>No tickets Remaining<br>
    </div>
@endif
  <div class="row mt-5">
        <div class="row mb-0 pad-5">
                <a class="mt-3 blue darken-4 waves-effect waves-light btn-small" href="{{ route('activities')}}"><i class="material-icons left">keyboard_arrow_left</i>Back</a>
            </div>
        <div class="col s12 m5 l6">
            <div class="card-panel">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="materialboxed" width="480" src="{{ asset('img/castillo.jpg') }}">
                </div>
            </div>
        </div>
        <div class="col s12 m5 l6">
            <div class="card-panel">
                    <span class="card-title activator grey-text text-darken-4"><h4>{{ $activity->name }}</h4></span>
                    <p>Description {{ $activity->description }}</p>
                    <br>
                    <p><i class="left material-icons">date_range</i> Date: {{ $activity->date }}</p>
                    <br>
                    <p><i class="left material-icons">access_time</i> Hour: {{ $activity->hour }}</p>
                    <br>
                    <p><i class="left material-icons">attach_money</i> Price: (Adult) {{ $activity->price_adult }} (Child) {{ $activity->price_child }}</p>
                    <br>
                    <p><i class="left material-icons">local_activity</i> Remaining Tickets: {{ $activity->capacity }}</p>
                
            </div>
            </div>
      </div>

    
        
    <div class="row">
        {!! Form::open(['method' => 'POST', 'route'=>['activityReservation']]) !!}
        <div class="card-panel">
                <span class="card-title activator grey-text text-darken-4"><h5>Reservation</h5></span>

                <div class="row">

                
                <div class="col m6">
                    <div class="form-group">
                        <input type='hidden' name="activity_id" value = "{{$activity->id}}" class="form-control" />
                        <strong> Adult number</strong>
                        <div class='input-group date' id='adult_number'>
                                <input type='number' name="adult_number" class="form-control" /> 
                        </div>
                    </div>
                </div>
            
                <div class="col m6">
                    <div class="form-group">
                        <strong> Child number</strong>
                        <div class='input-group date' id='child_number'>
                                <input type='number' name="child_number" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col right">
                        {!! Form::button('Reservar', ['type' => 'submit', 'class' => 'blue darken-4 waves-effect waves-light btn']) !!}
                        {!! Form::close() !!}
                </div>
                    
            </div>
        </div>
            
    </div>


        
    </div>
</div>
@endsection
@section('script')
    <script>$(document).ready(function(){
            $('.materialboxed').materialbox();
          });</script>    
@endsection
