@extends('despevago.app')

@section('title', 'Search a car')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')

<div class="container">
    <div class="row">
        <h3>Search your activity</h3>
    </div>


    @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whooops!</strong> There were some problems with your input.<br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
</div>

<div class="container">
    <div class="form-group col-lg-4 col-sm-6">
        <div class="row">
                {!! Form::open(['method' => 'POST','route'=>['activitiesByCity']]) !!}
                {!! Form::label('city_id', 'City'); !!}
                {!! Form::select('city_id', ["Cities" => $citiesName], null, array('class' => 'form-control', 'placeholder' => "Select a city")) !!}
                {!! Form::button('Search', ['type' => 'submit', 'class' => 'btn btn-sm btn-primary']) !!}
                {!! Form::close() !!}
        </div>
    </div>
</div>

        