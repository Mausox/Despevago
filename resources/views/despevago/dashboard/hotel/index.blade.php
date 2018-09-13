@extends('adminlte::page')

@section('title', 'Dashboard - Hotels')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->


    <section class="content-header">
        <h1>
            Hotel Index
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
                <a href="{!! url('dashboard/hotels/create') !!}"> <button type="button" class="btn btn-success">+ Create new hotel</button></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-top:20px">
            <div style="margin-left:1.5em;">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Score</th>
                            <th>Description</th>
                            <th>City</th>
                            <th>Rooms capacity</th>
                            <th>Address</th>
                            <th>View Hotel</th>
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
                                {!! $hotel->rooms_capacity !!}
                            </td>
                            <td>
                                {!! $hotel->address !!}
                            </td>

                            <td>
                                <a href="{!! url('dashboard/hotels/'.$hotel->id) !!}"> <button type="button" class="btn btn-info">View</button></a>
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