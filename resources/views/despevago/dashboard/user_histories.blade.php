@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Latest News
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
                    <th>Action Type</th>
                    <th>Action</th>
                    <th>Date</th>
                    <th>Hour</th>
                    <th>User</th>
                    <th>User Type</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users_histories as $user_histories)
                    <tr>
                        <td>
                            {!! $user_histories->action_type !!}
                        </td>
                        <td>
                            {!! $user_histories->action !!}
                        </td>
                        <td>
                            {!! $user_histories->date !!}
                        </td>
                        <td>
                            {!! $user_histories->hour !!}
                        </td>
                        <td>
                            {!! $user_histories->user->first_name.' '.$user_histories->user->last_name !!}
                        </td>
                        <td>
                            @if($user_histories->user->has_user_type('admin'))
                                Administrator
                            @else
                                User
                            @endif
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
            } );
        } );
    </script>
@stop