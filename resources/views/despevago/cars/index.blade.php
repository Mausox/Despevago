@extends('despevago.app')


@section('title', 'Cars')

@include('despevago.headers.headerAuth')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <h3>Cars</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="pull-right">
                <a class="btn btn-lg btn-success" href="{{ route('cars.create') }}">Create a new car</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Car ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Type</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Branch Office ID</th>
            <th width="300px">Actions</th>
        </tr>

        @foreach($cars as $car)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $car->id }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->type }}</td>
                <td>{{ $car->capacity }}</td>
                <td>{{ $car->price }}</td>
                <td>{{ $car->branch_office_id }}</td>
                <td>
                    <div class="">
                    <a class="btn btn-sm btn-info" href="{{ route('cars.show', $car->id) }}">Show</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('cars.edit', $car->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route'=>['cars.destroy', $car->id]]) !!}
                    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    {!! $cars->links() !!}
    </div>
@endsection