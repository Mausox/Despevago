@extends('despevago.app')


@section('title', 'Activities')

@include('despevago.headers.headerAuth')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
        <h3>Activities in {{ $city }}</h3>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Activity ID</th>
            <th>Address</th>
            <th>Date</th>
            <th>Price Adult</th>
            <th>Price Child</th>
            <th>Hour</th>
            <th>Description</th>
            <th>Capacity</th>
            <!--<th>City ID</th>-->
            <th width="300px">Actions</th>
        </tr>

        @foreach($activities as $activity)
            <tr>
                <td>{{ $activity->id }}</td>
                <td>{{ $activity->address }}</td>
                <td>{{ $activity->date }}</td>
                <td>{{ $activity->price_adult }}</td>
                <td>{{ $activity->price_child }}</td>
                <td>{{ $activity->hour }}</td>
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->capacity }}</td>
                <!--<td>{{ $activity->city_id }}</td>-->
                <td>
                    <div class="">
                    <a class="btn btn-sm btn-info" href="{{ route('activity.show', $activity->id) }}">Show</a>
                    
                </td>
            </tr>
        @endforeach
    </table>

    <div class="row">
    <a class="btn btn-sm btn-success" href="{{ route('activities')}}">Back</a>
    </div>

    </div>
@endsection