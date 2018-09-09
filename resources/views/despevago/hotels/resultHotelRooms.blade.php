@extends('despevago.materialize')

@section('title', 'room search')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
    <div class="container">
        <h1>Hotel {{$hotel->name}}</h1>
        {!!Form::open(['method' => 'GET', 'route' => ['searchHotel']])!!}
        {!!Form::hidden('city_id', $rooms->first()->hotel()->first()->id)!!}
        {!!Form::hidden('start_date', $start_date)!!}
        {!!Form::hidden('end_date', $end_date)!!}
        {!!Form::hidden('number_adults', $number_adults)!!}
        {!!Form::hidden('number_children', $number_children)!!}
        {!!Form::hidden('number_room', $rooms->count())!!}
        <button type="submit" class="mt-3 blue darken-4 waves-effect waves-light btn-small"><i class="material-icons left">keyboard_arrow_left</i>Back</button>
        {!!Form::close()!!}
        <div class="row">
            @foreach($rooms as $room)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row ">
                                <img class="activator" src="{{ asset('img/room.jpg')}}" width="300px" height="300px" align="left">
                                <p><i class="left material-icons">person</i> Capacity: {{ $room->capacity }}</p>
                                <p><i class="left material-icons">attach_money</i> Adult price: {{$room->adult_price}}</p>
                                <p><i class="left material-icons">attach_money</i> Children price: {{$room->child_price}}</p>
                                <p><i class="left material-icons">subject</i> Description: {{$room->description}}</p>
                                <p><i class="left material-icons">subject</i> Extras
                                @foreach($room->room_options() as $room_option)
                                    <p>{{$room_option}}
                                @endforeach
                                </p>
                                {!!Form::open(['route' => 'roomReservation'])!!}
                                {!!Form::hidden('room_id', $room->id)!!}
                                {!!Form::hidden('start_date', $start_date)!!}
                                {!!Form::hidden('end_date', $end_date)!!}
                                {!!Form::hidden('number_adults', $number_adults)!!}
                                {!!Form::hidden('number_children', $number_children)!!}
                                @if(Auth::check())
                                    <div class="col right">
                                        <button type="submit" class="blue darken-4 waves-effect waves-light btn">Add to cart!</button>
                                        {!!Form::close()!!}
                                    </div>


                                @else
                                    {!!Form::close()!!}
                                        <div class="col right">

                                        <a href="{!! url('/login') !!}"><button class="blue darken-4 waves-effect waves-light btn"> Sing in first</button></a>
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