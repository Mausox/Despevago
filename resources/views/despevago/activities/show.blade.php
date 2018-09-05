@extends('despevago.app')


@section('title', 'Show activity')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h3>Show Activity ID: {{$activity->id}} </h3> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong> Address: </strong>
                {{ $activity->address }}
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong> Date: </strong>
                    {{ $activity->date }}
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong> Price adult: </strong>
                {{ $activity->price_adult }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong> Price child: </strong>
                {{ $activity->price_child }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong> Hour: </strong>
                {{ $activity->hour }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong> Description: </strong>
                {{ $activity->description }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong> Capacity: </strong>
                {{ $activity->capacity }}
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <strong> City: </strong>
                    {{ $city }}
                </div>
            </div>
        </div>

    <div class="row">
        <a class="btn btn-sm btn-success" href="{{ route('activities') }}">Back</a>
        <br>
    </div>
    
    <div class="row">
            <div class="form-group">
                {!! Form::open(['method' => 'POST', 'route'=>['activityReservation']]) !!}
                <input type='hidden' name="activity_id" value = "{{$activity->id}}" class="form-control" />
                <strong> Adult number</strong>
                <div class='input-group date' id='adult_number'>
                        <input type='number' name="adult_number" class="form-control" />
                        
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <strong> Child number</strong>
                <div class='input-group date' id='child_number'>
                        <input type='number' name="child_number" class="form-control" />
                </div>
            </div>
        </div>

        <div class="row">
                {!! Form::button('Reservar', ['type' => 'submit', 'class' => 'btn btn-sm btn-primary']) !!}
                {!! Form::close() !!}
        </div>
        
    </div>
</div>
@endsection
