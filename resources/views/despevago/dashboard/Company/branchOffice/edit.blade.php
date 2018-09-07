@extends('adminlte::page')

@section('content_header')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Branch Office
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@stop

@section('content')
@if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whooops!</strong> There were some problems with your input.<br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif


    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">

                {!!  Form::open(['route' => ['branch_offices.update','id' => $branch_office->id],'method' => 'put','files' => true]) !!}

                {!! Form::token(); !!}

                <div class="form-group">
                    {!! Form::label('address', 'Address'); !!}
                    {!! Form::text('address', $branch_office->address, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'address'])
                </div>

                <div class="form-group">
                    {!! Form::hidden('company_id', $company_id, array('class' => 'form-control', 'required' => 'required')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('telephone', 'Telephone'); !!}
                    {!! Form::text('telephone', $branch_office->telephone, array('class' => 'form-control', 'required' => 'required')); !!}
                    @include('common.errors', ['name' => 'telephone'])
                </div>

                <div class="form-group">
                    {!! Form::label('city_id', 'City'); !!}
                    {!! Form::select('city_id', ["Cities" => $cities],null, array('class' => 'form-control', 'placeholder' => "Select a city")) !!}
                    @include('common.errors', ['name' => 'city_id'])
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div style="margin-top:20px" class="text-center mb-3">
                        {!! Form::button('Edit Branch Office', array('class' => 'btn btn-primary', 'type' => 'submit')); !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>




        </div>
    </div>

    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/viewStyle.css') }}">

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@stop