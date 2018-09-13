@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Habitación
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

                {!!  Form::open(['route' => ['rooms.update','id' => $room->id],'method' => 'put','files' => true]) !!}

                {!! Form::token(); !!}

                <div class="form-group">
                    {!! Form::label('numeration', 'Numeración'); !!}
                    {!! Form::text('numeration', $room->numeration, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'numeration'])
                </div>

                <div class="form-group">
                    {!! Form::hidden('hotel_id', $hotel_id, array('class' => 'form-control', 'required' => 'required')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('capacity', 'Capacidad'); !!}
                    {!! Form::text('capacity', $room->capacity, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'capacity'])
                </div>

                <div class="form-group">
                    {!! Form::label('adult_price', 'Precio Adulto'); !!}
                    {!! Form::text('adult_price', $room->adult_price, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'adult_price'])
                </div>

                <div class="form-group">
                    {!! Form::label('child_price', 'Precio Niño'); !!}
                    {!! Form::text('child_price', $room->child_price, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'child_price'])
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Descripción'); !!}
                    {!! Form::textarea  ('description', $room->description, array('class' => 'form-control','required' => 'required')); !!}
                    @include('common.errors', ['name' => 'description'])
                </div>

                <div class="form-group">
                    {!! Form::label('room_options', 'Seleccione las opciones de la habitación'); !!}
                    {!! Form::select('$room_option_id', ["Opciones habitación" => $room_options_name],$actual_room_options, array('class' => 'js-example-basic-multiple form-control', 'name' => 'room_options[]', 'multiple' => 'multiple')) !!}

                    <div class="form-group">
                        {!! Form::label('room_image', 'Imagen de la habitación'); !!}
                        {!! Form::file('room_image', array('class' => 'form-control'));!!}
                        @include('common.errors', ['name' => 'room_image'])
                    </div>


                </div>


            </div>

            <div class="row">
                <div class="col-md-12">
                    <div style="margin-top:20px" class="text-center mb-3">
                        {!! Form::button('Modificar Habitación', array('class' => 'btn btn-primary', 'type' => 'submit')); !!}
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

@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@stop