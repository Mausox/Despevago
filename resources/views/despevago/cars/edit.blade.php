@extends('despevago.app')


@section('title', 'Edit a car')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h3>Edit a car</h3>
            </div>
        </div>
    </div>

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

    {!! Form::model( $car, [ 'method' => 'PUT', 'route' => ['cars.update', $car->id]]) !!}
        @include('despevago.cars.form')
    {!! Form::close() !!}
</div>
@endsection