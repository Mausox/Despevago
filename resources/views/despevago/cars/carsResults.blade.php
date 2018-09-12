@extends('despevago.materialize')

@section('title', 'room search')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
    <div class="container">

        <h1>Company {{$branch_office->company->name}}</h1>
        {!!Form::open(['method' => 'GET', 'route' => ['searchCarCompanies']])!!}
        {!!Form::hidden('branch_office_id', $branch_office->id)!!}
        {!!Form::hidden('start_date', $start_date)!!}
        {!!Form::hidden('end_date', $end_date)!!}
        {!!Form::hidden('start_hour', $start_hour)!!}
        {!!Form::hidden('end_hour', $end_hour)!!}
        <button type="submit" class="mt-3 blue darken-4 waves-effect waves-light btn-small"><i class="material-icons left">keyboard_arrow_left</i>Back</button>
        {!!Form::close()!!}
        <div class="row">
            @foreach($cars as $car)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row ">
                                <img class="activator" src="{{ asset('img/default/car_default.png')}}" width="300px" height="300px" align="left">
                                <p style="padding-top:20px;" ><i class="left material-icons">directions_car</i> Brand: {{ $car->brand }} - {{$car->model}} </p>

                                <p style="padding-top:20px;"><i class="left material-icons">star</i> Type: {{ $car->type }} </p>

                                <p style="padding-top:20px;"><i class="left material-icons">person</i> Capacity: {{$car->capacity}}</p>

                                <p style="padding-top:20px;"><i class="left material-icons">attach_money</i> Price: {{$car->price}}</p>

                                    {!!Form::open(['route' => 'carReservation'])!!}
                                    {!!Form::hidden('car_id', $car->id)!!}
                                    {!!Form::hidden('pick_up_date', $pick_up_date)!!}
                                    {!!Form::hidden('return_date', $return_date)!!}

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