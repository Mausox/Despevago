
@extends('despevago.app')

@section('title', 'Crear Hotel')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')
    <div class="container mt-3">
        <div class="row ">
            <div class="col-md-4 text-center">

                <H1>Hotel </H1> <h3>{!! $hotel->name !!}</h3>
                <hr>
                <img width="200px" height="200px" src="{{Storage::url($hotel->hotel_image)}}"/>

            </div>
            <div class="col-md-8">
                <div class="card mb-8">

                    <p>Email: {!! $hotel->email !!}</p>

                    <p>Score: {!! $hotel->score !!}</p>

                    <p>Ciudad: {!! $city !!}</p>
                </div>

                <div class="row">
                    @foreach($contacts as $contact)
                        <div class="col-md-3">
                            <div class="card mb-3">

                                <p> <i class="fas fa-phone"></i>  {!! $contact !!} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>

        <div>
            <div class="col-md-4"></div>

        </div>
    </div>
@endsection

@section('script')
    @include('common.matchpass')
@endsection