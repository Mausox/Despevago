@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Hotel
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

                {!!  Form::open(['route' => ['hotels.update','id' => $hotel->id],'method' => 'put','files' => true]) !!}

                {!! Form::token(); !!}

                <div class="text-center mb-3">
                    <img class="" style="margin-bottom:20px" width="200px" height="200px" src="{{Storage::url($hotel->hotel_image)}}"/>
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Name'); !!}
                    {!! Form::text('name', $hotel->name, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'name'])
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'E-mail'); !!}
                    {!! Form::email('email', $hotel->email, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'email'])
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description'); !!}
                    {!! Form::textarea('description', $hotel->description, array('class' => 'form-control', 'required' => 'required', 'placeholder' => "Ingrese una breve descripción de su hotel")); !!}
                    @include('common.errors', ['name' => 'description'])
                </div>

                <div class="form-group">
                    {!! Form::label('address', 'Address'); !!}
                    {!! Form::text('address', $hotel->address, array('class' => 'form-control','required' => 'required')); !!}
                    @include('common.errors', ['name' => 'address'])
                </div>

                <div class="form-group">
                    {!! Form::label('rooms_capacity', 'Rooms Capacity'); !!}
                    {!! Form::text('rooms_capacity', $hotel->rooms_capacity, array('class' => 'form-control','required' => 'required')); !!}
                    @include('common.errors', ['name' => 'rooms_capacity'])
                </div>

                <div class="form-group">
                    {!! Form::label('city_id', 'City'); !!}
                    {!! Form::select('city_id', ["Ciudades" => $cities],$hotel->city_id, array('class' => 'form-control', 'placeholder' => "Seleccione una ciudad")) !!}
                    @include('common.errors', ['name' => 'city_id'])
                </div>

                <div class="form-group">
                    {!! Form::label('telephone', 'Phone'); !!}
                    {!! Form::text('telephone', $hotel->telephone, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'telephone'])
                </div>

                <div class="form-group">
                    {!! Form::label('hotel_image', 'Hotel Image'); !!}
                    {!! Form::file('hotel_image', array('class' => 'form-control'));!!}
                    @include('common.errors', ['name' => 'hotel_image'])
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div style="margin-top:20px" class="text-center mb-3">
                        {!! Form::button('Edit Hotel', array('class' => 'btn btn-primary', 'type' => 'submit')); !!}
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
