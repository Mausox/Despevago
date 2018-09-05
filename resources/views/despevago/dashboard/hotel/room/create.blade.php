@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Crear Habitación
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

                {!!  Form::open(['route' => 'room.store','method' => 'post','files' => true]) !!}

                {!! Form::token(); !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre'); !!}
                    {!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'name'])
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'E-mail'); !!}
                    {!! Form::email('email', null, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'email'])
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Descripción'); !!}
                    {!! Form::textarea('description', null, array('class' => 'form-control', 'required' => 'required', 'placeholder' => "Ingrese una breve descripción de su hotel")); !!}
                    @include('common.errors', ['name' => 'description'])
                </div>

                <div class="form-group">
                    {!! Form::label('telephone', 'Teléfono'); !!}
                    {!! Form::text('telephone', null, array('class' => 'form-control','required' => 'required')); !!}
                    @include('common.errors', ['name' => 'description'])
                </div>

                <div class="form-group">
                    {!! Form::label('address', 'Dirección'); !!}
                    {!! Form::text('address', null, array('class' => 'form-control','required' => 'required')); !!}
                    @include('common.errors', ['name' => 'address'])
                </div>

                <div class="form-group">
                    {!! Form::label('rooms_capacity', 'Capacidad de habitaciones'); !!}
                    {!! Form::text('rooms_capacity', null, array('class' => 'form-control','required' => 'required')); !!}
                    @include('common.errors', ['name' => 'rooms_capacity'])
                </div>

                <div class="form-group">
                    {!! Form::label('city_id', 'Ciudad'); !!}
                    {!! Form::select('city_id', ["Ciudades" => $cities],null, array('class' => 'form-control', 'placeholder' => "Seleccione una ciudad")) !!}
                    @include('common.errors', ['name' => 'city_id'])
                </div>

                <div class="form-group">
                    {!! Form::label('hotel_image', 'Imagen del hotel'); !!}
                    {!! Form::file('hotel_image', array('class' => 'form-control'));!!}
                    @include('common.errors', ['name' => 'hotel_image'])
                </div>


        </div>

        <div class="row">
            <div class="col-md-12">
                <div style="margin-top:20px" class="text-center mb-3">
                    {!! Form::button('Crear Hotel', array('class' => 'btn btn-primary', 'type' => 'submit')); !!}
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
