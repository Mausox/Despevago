@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hotel View
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@stop

@section('content')
    <div style="margin:1.5em;">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Puntuación</th>
                <th>Descripción</th>
                <th>Ciudad</th>
                <th>Ver Hotel</th>
            </tr>
            </thead>
            <tbody>

            @foreach($hotels as $hotel)
                <tr>
                    <td>
                        {!! $hotel->name !!}
                    </td>
                    <td>
                        {!! $hotel->email !!}
                    </td>
                    <td>
                        {!! $hotel->score !!}
                    </td>
                    <td>
                        {!! $hotel->description !!}
                    </td>
                    <td>
                        {!! $hotel->city->name !!}
                    </td>
                    <td>
                        <a href="{!! url('dashboard/hotels/'.$hotel->id) !!}"> <button type="button" class="btn btn-info">Ver</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/viewStyle.css') }}">

@stop
