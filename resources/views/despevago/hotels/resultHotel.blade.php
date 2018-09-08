@extends('despevago.materialize')

@section('title', 'Hotel Search')

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
                    <a class="mt-3 blue darken-4 waves-effect waves-light btn-small" href="{{ route('searchFormHotel')}}"><i class="material-icons left">keyboard_arrow_left</i>Back</a>
                </div>
                <div class="card-content">
                    <span class="card-title align center"><h5 class="mb-1 mt-0">Hotels in {{ $hotels->first()->city()->first()->name }}</h5></span>
                    <div class="row 12">
                        @foreach ($hotels as $hotel)

                            <div class="col s12 m6 l4 xl4">
                                <div class="card sticky-action">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="{{ asset('img/hotel.jpg') }}">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4">{{ $hotel->name }}<i class="material-icons right">more_vert</i></span>
                                    </div>
                                    <div class="card-reveal valign-wrapper">
                                        <span class="card-title grey-text text-darken-4">{{ $hotel->name }}<i class="material-icons right">close</i></span>
                                        <p>Description {{ $hotel->description }}</p>
                                        <br>
                                        <p><i class="left material-icons">star</i> Score: {{ $hotel->score }}</p>
                                        <br>
                                        <p><i class="left material-icons">location_on</i> Address: {{ $hotel->address }}</p>
                                        <br>
                                        <p><i class="left material-icons">call</i> Telephone: {{$hotel->telephone}}</p>
                                        <br>
                                        <p><i class="left material-icons">alternate_email</i> Contact: {{ $hotel->email }}</p>
                                    </div>
                                    <div class="card-action">
                                        <div class="row mb-0">
                                            {!!Form::open(['method' => 'GET', 'route' => ['searchHotelRoom']])!!}
                                            {!!Form::hidden('hotel_id', $hotel->id)!!}
                                            {!!Form::hidden('start_date', $start_date)!!}
                                            {!!Form::hidden('end_date', $end_date)!!}
                                            {!!Form::hidden('number_room', $number_room)!!}
                                            {!!Form::hidden('number_adults', $number_adults)!!}
                                            {!!Form::hidden('number_children', $number_children)!!}
                                            <button type="submit" class="mt-3 blue darken-4 waves-effect waves-light btn-small"><i class="material-icons right">add</i>Available rooms</button>
                                            {!!Form::close()!!}
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

@section('script')
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endsection