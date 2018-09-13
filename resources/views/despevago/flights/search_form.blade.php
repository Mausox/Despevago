@extends('despevago.materialize')

@section('title', 'Find your flight')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    <div class="col 12">
        <div class="card mt-5">

            <div class="row mb-0 pad-5">
                <a class="mt-3 blue darken-4 waves-effect waves-light btn-small" href="{{ route('searchFlight')}}"><i class="material-icons left">keyboard_arrow_left</i>Back</a>
            </div>
            <div class="card-content">
                <span class="card-title align center"><h5 class="mb-1 mt-0">Departure Flights from {{ $departure_city }}</h5></span>

                <div class="row">

                    <div class="col s12 m12 l12">
                        @foreach ($departure_flights as $flight)
                        <div class="card sticky-action">
                            <div class="card-content">
                                <h5>Departure date: {{$departure_date}} to {{$arrival_city}}</h5>
                                <p>Flight Number: {{$flight->flight_number}}</p>
                                <p>Airplane Model: {{ $flight->airplane_model }}</p>
                                <p>Cabin Baggage: {{$flight->cabin_baggage}}</p>
                                <p>Capacity: {{$flight->capacity}}</p>
                            </div>

                            <div class="card-action">
                                <div class="row mb-0">
                                    <button type="submit" class="mt-3 blue darken-4 waves-effect waves-light btn-small"><i class="material-icons right">add</i>Select Seats</button>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>

            </div>
            
        </div>

        <div class="">

            <div class="card-content">
                <span class="card-title align center"><h5 class="mb-1 mt-0">Arrival Flights from {{ $arrival_city }}</h5></span>

                <div class="row">

                    <div class="col s12 m12 l12">
                        @foreach ($arrival_flights as $flight)
                        <div class="card sticky-action">
                            <div class="card-content">
                                <h5>Departure date: {{$arrival_date}} to {{$departure_city}}</h5>
                                <p>Flight Number: {{$flight->flight_number}}</p>
                                <p>Airplane Model: {{ $flight->airplane_model }}</p>
                                <p>Cabin Baggage: {{$flight->cabin_baggage}}</p>
                                <p>Capacity: {{$flight->capacity}}</p>
                            </div>

                            <div class="card-action">
                                <div class="row mb-0">
                                    <button type="submit" class="mt-3 blue darken-4 waves-effect waves-light btn-small"><i class="material-icons right">add</i>Select Seats</button>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>

            </div>
            
        </div>

    </div>
</div>
@endsection