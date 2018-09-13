@extends('adminlte::page')

@section('title', 'Dashboard - Flights')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Airplane Index
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@stop

@section('content')

    @if (session('status'))
        <div class="alert alert-success text-center">
            <p>{{ session('status') }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12" style="margin-top:20px">
            <div style="margin-left:1.5em;">
                <a href="{!! url('dashboard/flight/create') !!}"> <button type="button" class="btn btn-success">+ Create new flight</button></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-top:20px">
            <div style="margin-left:1.5em;">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Flight Number</th>
                            <th>Cabin baggage</th>
                            <th>Capacity</th>
                            <th>Airplane Model</th>
                            <th>Airline</th>
                            <th>View Flight</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($flights as $flight)
                        <tr>
                            <td>
                                {!! $flight->flight_number !!}
                            </td>
                            <td>
                                {!! $flight->cabin_baggage !!}
                            </td>
                            <td>
                                {!! $flight->capacity !!}
                            </td>
                            <td>
                                {!! $flight->airplane_model !!}
                            </td>
                            <td>
                                {!! $flight->airline->name !!}
                            </td>

                            <td>
                                <a href="{!! url('dashboard/flight/'.$flight->id) !!}"> <button type="button" class="btn btn-info">View</button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {

            } );
        } );
    </script>
@stop