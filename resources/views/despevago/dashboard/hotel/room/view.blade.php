@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vista Habitación
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
            <div style="margin-left:1.5em; display:inline-flex" >

                    <a href="{{ url('/dashboard/hotels/rooms/'.($room->id).'/edit') }}" style="margin-right:10px"> <button type="button" class="btn btn-primary">Editar</button></a>
                    <form method="post" action="{{ url('/dashboard/hotels/'.($room->id)) }}">
                         @csrf
                        {{ csrf_field() }}

                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div style="margin:1.5em;">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img class="" style="margin-bottom:20px" width="200px" height="200px" src="{{Storage::url($room->room_image)}}"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <tbody>
                            <tr>
                                <th>Numeración</th>
                                <td>{!! $room->numeration !!}</td>
                            </tr>
                            <tr>
                                <th>Capacidad</th>
                                <td>{!! $room->capacity !!}</td>

                            </tr>
                            <tr>
                                <th>Precio Adulto</th>
                                <td>{!! $room->adult_price !!}</td>
                            </tr>
                            <tr>
                                <th>Precio Niños</th>
                                <td>{!! $room->child_price !!}</td>
                            </tr>

                            <tr>
                                <th>Descripción</th>
                                <td>
                                    {!! $room->description !!}
                                </td>
                            </tr>

                            <tr>
                                <th>Opciones de la habitación</th>
                                    <td>
                                        <ul>
                                            @foreach($roomOptions as $roomOption)

                                                  <li>{!! $roomOption->name !!}: {!! $roomOption->feature !!}</li>

                                            @endforeach
                                        </ul>
                                    </td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/viewStyle.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#example2').DataTable( {
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
