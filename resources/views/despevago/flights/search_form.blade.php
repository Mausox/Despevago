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

            @if (session('status'))
                <div class="alert alert-warning" role="alert">
                    <p>{{ session('status') }}</p>
                </div>
            @endif

            <div class="row mb-0 pad-5">
                <a class="mt-3 blue darken-4 waves-effect waves-light btn-small" href="{{ route('searchFlight')}}"><i class="material-icons left">keyboard_arrow_left</i>Back</a>
            </div>
            <div class="card-content">
                <span class="card-title align center"><h5 class="mb-1 mt-0">Departure Flights in {{ $departure_city }}</h5></span>
                @foreach ($departure_flights as $flight)

                <div class="row">
                        <div class="col">

                            <div class="card sticky-action">

                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">{{ $departure_flights->first()->id }}<i class="material-icons right">more_vert</i></span>
                                </div>

                                <div class="card-action">
                                    <div class="row mb-0">

                                        <button type="submit" class="mt-3 blue darken-4 waves-effect waves-light btn-small"><i class="material-icons right">add</i>Available rooms</button>
                                </div>
                            </div>

                        </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection