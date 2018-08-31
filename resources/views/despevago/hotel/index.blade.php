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
    <table id="example" class="hover" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Score</th>
            <th>Description</th>
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
                    <button type="button" class="btn btn-info">Info</button>
                </td>
            </tr>
        @endforeach
        </tbody>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script> $(document).ready(function() {
            $('#example').DataTable();
        } ); </script>
@stop