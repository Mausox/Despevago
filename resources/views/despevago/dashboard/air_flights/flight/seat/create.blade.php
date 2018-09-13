@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Seat
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@stop

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">

                {!!  Form::open(['route' => 'seat.store','method' => 'post']) !!}

                {!! Form::token(); !!}

                <div class="form-group">
                    {!! Form::label('number', 'Number'); !!}
                    {!! Form::text('number', null, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'number'])
                </div>

                <div class="form-group">
                    {!! Form::hidden('status', 0, array('class' => 'form-control', 'required' => 'required')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Price'); !!}
                    {!! Form::text('price', null, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'price'])
                </div>

                <div class="form-group">
                    {!! Form::hidden('passenger_id', 1, array('class' => 'form-control','required' => 'required')); !!}
                </div>

                <div class="form-group">
                    {!! Form::hidden('flight_id', $flight_id, array('class' => 'form-control','required' => 'required')); !!}
                </div>


                <div class="form-group">
                    {!! Form::label('class_type_id', 'Class Type'); !!}
                    {!! Form::select('class_type_id', ["Class Types" => $class_types_name],null, array('class' => 'form-control', 'placeholder' => "Select an Airline")) !!}
                    @include('common.errors', ['name' => 'class_type_id'])
                </div>


        </div>

        <div class="row">
            <div class="col-md-12">
                <div style="margin-top:20px" class="text-center mb-3">
                    {!! Form::button('Create Seat', array('class' => 'btn btn-primary', 'type' => 'submit')); !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>




        </div>
    </div>

    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/viewStyle.css') }}">

@stop
