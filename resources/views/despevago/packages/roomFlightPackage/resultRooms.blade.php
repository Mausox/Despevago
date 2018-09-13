@extends('despevago.materialize')

@section('title', 'Room search')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
    <div class="container">
        <a class="mt-3 blue darken-4 waves-effect waves-light btn-small" href="{{ route('packages')}}"><i class="material-icons left">keyboard_arrow_left</i>Back</a>
        <div class="row">
            @foreach($rooms as $room)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row ">
                                <img class="activator" src="{{ asset('img/default/room_default.png')}}" width="300px" height="300px" align="left">
                                <p><i class="left material-icons">person</i> Capacity: {{ $room->capacity }}</p>
                                <p><i class="left material-icons">attach_money</i> Adult price: {{$room->adult_price}}</p>
                                <p><i class="left material-icons">attach_money</i> Children price: {{$room->child_price}}</p>
                                <p><i class="left material-icons">subject</i> Description: {{$room->description}}</p>
                                <p><i class="left material-icons">subject</i> Extras
                                @foreach($room->room_options() as $room_option)
                                    <p>{{$room_option}}
                                @endforeach
                                </p>

                                {!!Form::open(['route' => 'roomFlightPackageReservation'])!!}
                                {!!Form::hidden('room_id', $room->id)!!}
                                {!!Form::hidden('seat_id', $seat_id) !!}
                                {!!Form::hidden('city_id', $city->id) !!}
                                @if(Auth::check())
                                    <div class="col right">
                                        <button type="submit" class="blue darken-4 waves-effect waves-light btn">Add to cart!</button>
                                        {!!Form::close()!!}
                                    </div>


                                @else
                                    {!!Form::close()!!}
                                    <div class="col right">

                                        <a href="{!! url('/login') !!}"><button class="blue darken-4 waves-effect waves-light btn"> Sign in first</button></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection