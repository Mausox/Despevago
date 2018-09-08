@extends('despevago.materialize')

@section('title', $user->first_name. ' '.$user->last_name. ' shopping cart')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
    <div class="container">

        @if (session('status'))
            <div class="alert alert-danger text-center">
                <p>{{ session('status') }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Service</th>
                <th>Date & Time</th>
                <th>Description</th>
                <th>Price</th>

            </tr>
            @foreach($unaRooms as $unaRoom)
                <tr>
                    <td>Room </td>
                    <td>{{ $unaRoom->date }} </td>
                    <td>Hotel: {{ $unaRoom->room()->first()->hotel()->first()->name}}<p></p>
                        Description: {{ $unaRoom->room()->first()->hotel()->first()->description}}<p></p>
                        Score: {{ $unaRoom->room()->first()->hotel()->first()->score}}<p></p>
                    </td>
                    <td>Price:{{ $unaRoom->room()->first()->adult_price}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => 'user.shopping_cart.destroy']) !!}
                        <button type="submit" class="red darken-4 waves-effect waves-light btn-small">Remove</button>
                        {!! Form::hidden('service', 'room') !!}
                        {!! Form::hidden('unavailable_room_id', $unaRoom->id) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

            @foreach($activities as $activity)
                <tr>
                    <td>Activity </td>
                    <td>{{ $activity->date}} <p></p>
                        {{ $activity->hour}}</td>
                    <td>Address: {{ $activity->address}}<p></p>
                        Description: {{ $activity->description }}
                    </td>
                    <td>{{ $activity->price_adult}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => 'user.shopping_cart.destroy']) !!}
                        <button type="submit" class="red darken-4 waves-effect waves-light btn-small">Remove</button>
                        {!! Form::hidden('service', 'activity') !!}
                        {!! Form::hidden('activity_id', $activity->id) !!}
                    {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

            @foreach($seats as $seat)
                <tr>
                    <td>Flight </td>
                    <td>@foreach($seat->flight->journeys as $journey)
                            Departure: {{$journey->first()->departure_date}} <p></p>
                            Arrival:{{$journey->first()->arrival_date}}<p></p>
                        @endforeach
                    </td>
                    <td>Passenger: {{$seat->passenger()->first()->first_name}} {{$seat->passenger()->first()->last_name}}<p></p>
                        DNI: {{$seat->passenger()->first()->dni}}<p></p>
                        Number: {{ $seat->number}}<p></p>
                        Class type: {{ $seat->class_type()->first()->name }}<p></p>
                        Flight number: {{ $seat->flight()->first()->flight_number}}<p></p>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => 'user.shopping_cart.destroy']) !!}
                        <button type="submit" class="red darken-4 waves-effect waves-light btn-small">Remove</button>
                        {!! Form::hidden('service', 'seat') !!}
                        {!! Form::hidden('seat', $seat->id) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>Price:{{ $seat->price}}</td>
                </tr>
            @endforeach
        </table>

        {!! Form::open(['route' => 'user.finishReservation']) !!}
        <button type="submit" class=" blue darken-4 waves-effect waves-light btn-small">Buy</button>
        {!! Form::close() !!}
        <p></p>
        <a class=" blue darken-4 waves-effect waves-light btn-small" href="{{ route('user.profile') }}">Back</a>
    </div>
@endsection