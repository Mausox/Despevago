@extends('despevago.app')

@section('title', 'Hotel'.($hotel->name))

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')


@section('content')
    <div class="container">
        <h1>Hotel {{$hotel->name}}</h1>
        <a class="btn btn-md btn-success" href="{{ route('searchFormHotel') }}">Back</a>
        <div class="row">
            @foreach($rooms as $room)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p>Hotel: {{$room->hotel->name}}</p>
                            <p>Capacity: {{$room->capacity}}</p>
                            <p>Adult price: {{$room->adult_price}}</p>
                            <p>Children price: {{$room->child_price}}</p>
                            <p>Description: {{$room->description}}</p>
                            {!!Form::open(['route' => 'roomReservation'])!!}
                            {!!Form::hidden('room_id', $room->id)!!}
                            {!!Form::hidden('start_date', $start_date)!!}
                            {!!Form::hidden('end_date', $end_date)!!}
                            {!!Form::hidden('number_adults', $number_adults)!!}
                            {!!Form::hidden('number_children', $number_children)!!}
                            <button type="submit" class="btn btn-xs btn-primary">Add to cart!</button>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection