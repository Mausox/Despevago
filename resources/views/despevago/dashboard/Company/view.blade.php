@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Company view
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

                    <a href="{{ url('/dashboard/companies/'.($company->id).'/edit') }}" style="margin-right:10px"> <button type="button" class="btn btn-primary">Edit</button></a>
                    <form method="post" action="{{ url('/dashboard/companies/'.($company->id)) }}">
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
                
                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{!! $company->name !!}</td>
                            </tr>

                            <tr>
                                <th>Address</th>
                                <td>{!! $company->address !!}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{!! $company->email !!}</td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-top:20px">
            <div style="margin-left:1.5em;">
                <h3 class="text-center">Company's branch offices </h3>
                <hr style="color:red;">
                    <div style="margin:1.5em;">
                        <a href="{!! url('dashboard/companies/'.$company->id.'/branch_offices/create') !!}"> <button type="button" class="btn btn-success">+ Crear nueva branch office</button></a>
                    </div>



                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th>Company ID</th>
                            <th>City ID</th>
                            <th>Telephone</th>
                            <th>Show branch office</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($branch_offices as $branch_office)
                        <tr>
                            <td>
                                {!! $branch_office->address !!}
                            </td>
                            <td>
                                {!! $branch_office->company_id !!}
                            </td>
                            <td>
                                {!! $branch_office->city_id !!}
                            </td>
                            <td>
                                {!! $branch_office->telephone !!}
                            </td>
                            <td>
                                <a href="{!! url('dashboard/companies/branch_offices/'.$branch_office->id) !!}"> <button type="button" class="btn btn-info">Show</button></a>
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