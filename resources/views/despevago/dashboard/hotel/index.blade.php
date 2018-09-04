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
    <div style="margin:1.5em;">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Puntuación</th>
                <th>Descripción</th>
                <th>Ciudad</th>
                <th>Fecha creación</th>
                <th>Última actualización</th>

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ filas por página",
                    "zeroRecords": "Nada encontrado - Lo sentimos",
                    "info": "Mostrando Página _PAGE_ of _PAGES_",
                    "infoEmpty": "Tabla vacía",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Último",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                }
            } );
        } );
    </script>
@stop