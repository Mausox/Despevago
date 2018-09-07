@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Flight
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

                    <a href="{{ url('dashboard/flight/'.($flight->id).'/edit') }}" style="margin-right:10px"> <button type="button" class="btn btn-primary">Edit</button></a>
                    <form method="post" action="{{ url('/dashboard/flight/'.($flight->id)) }}">
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
                                <th>Flight Number</th>
                                <td>{!! $flight->flight_number !!}</td>
                            </tr>
                            <tr>
                                <th>Cabin Baggage</th>
                                <td>{!! $flight->cabin_baggage !!}</td>

                            </tr>
                            <tr>
                                <th>Capacity</th>
                                <td>{!! $flight->capacity !!}</td>
                            </tr>
                            <tr>
                                <th>Airplane Model</th>
                                <td>{!! $flight->airplane_model !!}</td>
                            </tr>

                            <tr>
                                <th>Airline Name</th>
                                <td>
                                    {!! $flight->airline->name !!}
                                </td>
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
                <h3 class="">Flight Seats</h3>
                <hr style="color:red;">
                <div style="margin:1.5em;">
                    <a href="{!! url('dashboard/flight/'.$flight->id.'/seat/create') !!}"> <button type="button" class="btn btn-success">+ Create new seat</button></a>
                </div>



                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Number</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Passenger</th>
                        <th>Class Type</th>
                        <th>View Seat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($seats as $seat)
                        <tr>
                            <td>
                                {!! $seat->number !!}
                            </td>
                            <td>
                                @if($seat->status == "1")
                                    Occupied
                                @else
                                    Free
                                @endif
                            </td>
                            <td>
                                {!! $seat->price !!}
                            </td>
                            <td>
                                <p>{!! $seat->passenger->first_name!!} {!! $seat->passenger->last_name !!} | {!! $seat->passenger->dni !!}</p>
                            </td>
                            <td>
                                {!! $seat->class_type->name !!}
                            </td>

                            <td class="text-center">
                                <a href="{!! url('dashboard/flight/seat/'.$seat->id) !!}"> <button type="button" class="btn btn-info">View</button></a>
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
