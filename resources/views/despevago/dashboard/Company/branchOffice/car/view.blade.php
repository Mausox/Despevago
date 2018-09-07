@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Car view
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

                    <a href="{{ url('/dashboard/companies/branch_offices/cars/'.($car->id).'/edit') }}" style="margin-right:10px"> <button type="button" class="btn btn-primary">Edit</button></a>
                    <form method="post" action="{{ url('/dashboard/companies/branch_offices/cars/'.($car->id)) }}">
                         @csrf
                        {{ csrf_field() }}

                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div style="margin:1.5em;">
                <!--
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img class="" style="margin-bottom:20px" width="200px" height="200px" src="{{Storage::url($car->car_image)}}"/>
                    </div>
                </div>-->

                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <tbody>
                            <tr>
                                <th>Brand</th>
                                <td>{!! $car->brand !!}</td>
                            </tr>
                            <tr>
                                <th>Model</th>
                                <td>{!! $car->model !!}</td>

                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>{!! $car->type !!}</td>
                            </tr>
                            <tr>
                                <th>Capacity</th>
                                <td>{!! $car->capacity !!}</td>
                            </tr>

                            <tr>
                                <th>Price</th>
                                <td>
                                    {!! $car->price !!}
                                </td>
                            </tr>

                            <tr>
                                <th>Branch Office ID</th>
                                <td>
                                    {!! $car->branch_office_id !!}
                                </td>
                            </tr>

                            <tr>
                                <th>Car options</th>
                                    <td>
                                        <ul>
                                            @foreach($carOptions as $carOption)

                                                  <li>{!! $carOption->name !!}</li>

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