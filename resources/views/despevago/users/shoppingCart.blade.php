@extends('despevago.app')

@section('title', $user->first_name. ' '.$user->last_name. ' shopping cart')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>Service</th>
                <th>Description</th>
                <th>Price</th>

            </tr>
            @foreach($unaRooms as $unaRoom)
                <tr>
                    <td>Room </td>
                    <td>Date: {{ $unaRoom->date }}</td>
                    <td>Price: ###</td>
                </tr>
            @endforeach
        </table>

        {!! Form::open(['route' => 'user.finishReservation']) !!}
        <button type="submit" class="btn btn-xs btn-primary">Buy</button>
        {!! Form::close() !!}
        <a class="btn btn-md btn-success" href="{{ route('user.profile') }}">Back</a>
    </div>
@endsection