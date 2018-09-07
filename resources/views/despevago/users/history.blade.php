@extends('despevago.app')

@section('title', $user->first_name. ' '.$user->last_name. ' shopping cart')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')
    <hr>
    <div class="container">
        <h1>{{$user->first_name}} {{$user->last_name}} history</h1>
        <table class="table table-bordered">
            <tr>
                <th>Date & Time</th>
                <th>Action</th>

            </tr>
            @foreach($user_histories as $user_history)
                <tr>
                    <td>{{ $user_history->date }} {{ $user_history->hour }}</td>
                    <td>{{ $user_history->action }}</td>
                </tr>
            @endforeach
        </table>
        <a class="btn btn-md btn-success" href="{{ route('user.profile') }}">Back</a>
    </div>
@endsection