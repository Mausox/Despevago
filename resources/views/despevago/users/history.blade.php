@extends('despevago.materialize')

@section('title', $user->first_name. ' '.$user->last_name. ' shopping cart')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
    <div class="container">
        <div class="card-panel mt-5">
        <span class="card-title valign center"><h5 class="mb-1 mt-0">{{$user->first_name}} {{$user->last_name}} history</h5></span>
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
        <a class="mt-5 blue darken-4 waves-effect waves-light btn" href="{{ route('user.profile') }}">Back</a>
    </div>

    </div>
@endsection