@extends('despevago.materialize')

@section('title', 'Transfer result')

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
                    <a class="mt-3 blue darken-4 waves-effect waves-light btn-small" href="{{ route('transfer.search')}}"><i class="material-icons left">keyboard_arrow_left</i>Back</a>
                </div>
                <div class="card-content">
                    <span class="card-title align center"><h5 class="mb-1 mt-0">Transfers from {{ $transfers->first()->airport()->first()->name }} to {{$transfers->first()->hotel()->first()->name}} Hotel</h5></span>
                    <div class="row 12">
                        @foreach ($transfers as $transfer)

                            <div class="col s12 m6 l4 xl4">
                                <div class="card sticky-action">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="{{ asset('img/default/transfer_default.png') }}">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4">Transfer type: {{$transfer->transfer_car()->first()->classification}}<i class="material-icons right">more_vert</i></span>
                                    </div>
                                    <div class="card-reveal valign-wrapper">
                                        <span class="card-title grey-text text-darken-4">{{ $transfer->name }}<i class="material-icons right">close</i></span>
                                        <p><i class="left material-icons">star</i>Classification: {{ $transfer->transfer_car()->first()->classification }}</p>
                                        <br>
                                        <p><i class="left material-icons">date_range</i> Date: {{ $transfer->start_date }}</p>
                                        <br>
                                        <p><i class="left material-icons">access_time</i> Hour: {{ $transfer->start_hour }}</p>
                                        <br>
                                        <p><i class="left material-icons">attach_money</i> Price: {{$transfer->price}}</p>
                                        <br>
                                        <p><i class="left material-icons">person</i> Capacity: {{ $transfer->transfer_car()->first()->capacity }}</p>
                                    </div>
                                    <div class="card-action">
                                        <div class="row mb-0">
                                            <a class="mt-3 blue darken-4 waves-effect waves-light btn-small"  href="{{route('transfers.show', $transfer->id, $numberPeople)}}"><i class="material-icons right">add</i>Rent transfer</a>
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