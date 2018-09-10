@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hotel View
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

                    <a href="{{ url('/dashboard/hotels/'.($hotel->id).'/edit') }}" style="margin-right:10px"> <button type="button" class="btn btn-primary">Edit</button></a>
                    <form method="post" action="{{ url('/dashboard/hotels/'.($hotel->id)) }}">
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
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <img class="" style="margin-bottom:20px" width="200px" height="200px" src="{{Storage::url($hotel->hotel_image)}}"/>
                    </div>
                    <div class="col-md-5"></div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{!! $hotel->name !!}</td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td>{!! $hotel->email !!}</td>

                            </tr>
                            <tr>
                                <th>Score</th>
                                <td>{!! $hotel->score !!}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $hotel->description !!}</td>
                            </tr>

                            <tr>
                                <th>Contact Phone <i class="fa fa-phone"></i></th>
                                <td>
                                    {!! $hotel->telephone !!}
                                </td>
                            </tr>

                            <tr>

                                <th>Address</th>

                                <td>{!! $hotel->address !!}</td>
                            </tr>

                            <tr>
                                <th>Rooms Capacity</th>
                                <td>{!! $hotel->rooms_capacity !!}</td>
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
                <h3 class="text-center">Hotel Rooms</h3>
                <hr style="color:red;">
                    <div style="margin:1.5em;">
                        <a href="{!! url('dashboard/hotels/'.$hotel->id.'/rooms/create') !!}"> <button type="button" class="btn btn-success">+ Create new room</button></a>
                    </div>



                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Numeration</th>
                            <th>Capacity</th>
                            <th>Adult Price</th>
                            <th>Child Price</th>
                            <th>Description</th>
                            <th>Show</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $room)
                        <tr>
                            <td>
                                {!! $room->numeration !!}
                            </td>
                            <td>
                                {!! $room->capacity !!}
                            </td>
                            <td>
                                {!! $room->adult_price !!}
                            </td>
                            <td>
                                {!! $room->child_price !!}
                            </td>
                            <td>
                                {!! $room->description !!}
                            </td>
                            <td class="text-center">
                                <a href="{!! url('dashboard/hotels/rooms/'.$room->id) !!}"> <button type="button" class="btn btn-info">Ver</button></a>
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
