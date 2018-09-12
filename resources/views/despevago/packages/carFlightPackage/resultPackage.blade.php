@extends('despevago.materialize')

@section('title', 'Car Flight Packages')

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
                <a class="mt-3 blue darken-4 waves-effect waves-light btn-small" href="{{ route('packages')}}"><i class="material-icons left">keyboard_arrow_left</i>Back</a>
            </div>          
                <div class="card-content">
                    <span class="card-title valign center"><h5 class="mb-1 mt-0">Packages in {{ $city->name }}</h5></span>
                    <div class="row 12">
                        @foreach ($packages as $package)

                        <div class="col s12 m6 l4 xl4">
                            <div class="card sticky-action">
                                <!--<div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="{{ asset('img/activity.jpg') }}">
                                </div>-->
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">{{ $package->name }}<i class="material-icons right">more_vert</i></span>
                                </div>  
                                <div class="card-reveal valign-wrapper">
                                    <span class="card-title grey-text text-darken-4">{{ $package->name }}<i class="material-icons right">close</i></span>
                                    <p><i class="left material-icons">date_range</i> From: {{ $package->start_date }}</p>
                                    <br>
                                    <p><i class="left material-icons">date_range</i> To: {{ $package->end_date }}</p>
                                    <br>
                                    <p><i class="left material-icons">attach_money</i> Discount: {{ $package->discount }} % off</p>
                                </div>
                                <div class="card-action">
                                    <div class="row mb-0">
                                        <a class="mt-3 blue darken-4 waves-effect waves-light btn-small"  href="{{ route('car_flight_packages.show', $package->id) }}"><i class="material-icons right">add</i>Buy</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection