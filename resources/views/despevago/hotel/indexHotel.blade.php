@extends('despevago.app')

@section('title', 'Vista Hoteles')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')

    <!-- Card -->
    <div class="container mt-3">

        <div class="row">

            @foreach($hotels as $hotel)
                <div class="col-md-4 ">
                    <!-- Card -->
                    <div class="card" style="margin-top: 20px">

                        <!-- Card image -->
                        <div class="view overlay">
                            <img width="300px" height="250px" class="card-img-top" src="{!! Storage::url($hotel->hotel_image)!!}" alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body">

                            <!-- Title -->
                            <h4 class="card-title">{!! $hotel->name !!}</h4>
                            <!-- Text -->
                            <p class="card-text">{!! $hotel->description !!}</p>
                            <!-- Button -->
                            <a href="#" class="btn btn-primary">Button</a>

                        </div>

                    </div>
                    <!-- Card -->

                </div>
            @endforeach
        </div>
    </div>

@endsection


@section('script')
    @include('common.matchpass')
@endsection