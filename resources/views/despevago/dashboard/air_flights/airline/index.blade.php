@extends('adminlte::page')

@section('title', 'Dashboard - Hotels')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Airline Index
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
                <a href="{!! url('dashboard/airline/create') !!}"> <button type="button" class="btn btn-success">+ Create new airline</button></a>
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
                            <th>Address</th>
                            <th>Score</th>
                            <th>Description</th>
                            <th>Telephone</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>View Airline</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($airlines as $airline)
                        <tr>
                            <td>
                                {!! $airline->name !!}
                            </td>
                            <td>
                                {!! $airline->address !!}
                            </td>
                            <td>
                                {!! $airline->score !!}
                            </td>
                            <td>
                                {!! $airline->description !!}
                            </td>
                            <td>
                                {!! $airline->telephone !!}
                            </td>
                            <td>
                                {!! $airline->created_at !!}
                            </td>
                            <td>
                                {!! $airline->updated_at !!}
                            </td>
                            <td>
                                <a href="{!! url('dashboard/airline/'.$airline->id) !!}"> <button type="button" class="btn btn-info">View</button></a>
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