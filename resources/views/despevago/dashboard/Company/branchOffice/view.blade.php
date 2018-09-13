@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Branch Office view
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

                    <a href="{{ url('/dashboard/companies/branch_offices/'.($branch_office->id).'/edit') }}" style="margin-right:10px"> <button type="button" class="btn btn-primary">Edit</button></a>
                    <form method="post" action="{{ url('/dashboard/companies/branch_offices/'.($branch_office->id)) }}">
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
                                <th>Address</th>
                                <td>{!! $branch_office->address !!}</td>
                            </tr>

                            <tr>
                                <th>Telephone</th>
                                <td>{!! $branch_office->telephone !!}</td>
                            </tr>

                            <tr>
                                <th>Company ID</th>
                                <td>{!! $branch_office->company_id !!}</td>

                            </tr>
                            
                            <tr>
                                <th>City ID</th>
                                <td>{!! $branch_office->city_id !!}</td>
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
                <h3 class="text-center">Branch office's cars </h3>
                <hr style="color:red;">
                    <div style="margin:1.5em;">
                        <a href="{!! url('dashboard/companies/branch_offices/'.$branch_office->id.'/cars/create') !!}"> <button type="button" class="btn btn-success">+ Create a new car</button></a>
                    </div>



                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Branch Office ID</th>
                            <th>Show car</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <td>
                                {!! $car->brand !!}
                            </td>
                            <td>
                                {!! $car->model !!}
                            </td>
                            <td>
                                {!! $car->type !!}
                            </td>
                            <td>
                                {!! $car->capacity !!}
                            </td>
                            <td>
                                {!! $car->price !!}
                            </td>
                            <td>
                                {!! $car->branch_office_id !!}
                            </td>
                            <td>
                                <a href="{!! url('dashboard/companies/branch_offices/cars/'.$car->id) !!}"> <button type="button" class="btn btn-info">Show</button></a>
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
            } );
        } );
    </script>
@stop