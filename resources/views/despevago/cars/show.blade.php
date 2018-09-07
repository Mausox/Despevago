@extends('despevago.app')


@section('title', 'Show a car')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h3>Show Car ID: {{$car->id}} </h3> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong> Brand: </strong>
                {{ $car->brand }}
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong> Model: </strong>
                    {{ $car->model }}
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong> Type </strong>
                {{ $car->type }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong> Capacity: </strong>
                {{ $car->capacity }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong> Price: </strong>
                {{ $car->price }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong> Branch Office ID: </strong>
                {{ $car->branch_office_id }}
            </div>
        </div>
    </div>

    <div class="row">
        <a class="btn btn-sm btn-success" href="{{ route('cars.index') }}">Back</a>
    </div>
</div>
@endsection

