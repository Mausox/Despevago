@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Airline
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

                {!!  Form::open(['route' => ['airline.store'],'method' => 'post']) !!}

                {!! Form::token(); !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name'); !!}
                    {!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'name'])
                </div>

                <div class="form-group">
                    {!! Form::label('address', 'Address'); !!}
                    {!! Form::text('address', null, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'address'])
                </div>

                <div class="form-group">
                    {!! Form::label('score', 'Score'); !!}
                    {!! Form::select('score', array('1','2','3','4','5'), array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'score'])
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description'); !!}
                    {!! Form::textarea('description', null, array('class' => 'form-control', 'required' => 'required', 'placeholder' => "Ingrese una breve descripción de su hotel")); !!}
                    @include('common.errors', ['name' => 'description'])
                </div>

                <div class="form-group">
                    {!! Form::label('telephone', 'Telephone'); !!}
                    {!! Form::text('telephone', null, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'telephone'])
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div style="margin-top:20px" class="text-center mb-3">
                        {!! Form::button('Create Airline', array('class' => 'btn btn-primary', 'type' => 'submit')); !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/viewStyle.css') }}">

@stop
