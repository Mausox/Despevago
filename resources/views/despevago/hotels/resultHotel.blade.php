@extends('despevago.materialize')

@section('title', 'Hotel Search')

@section('content')
    <div class="container">
        <div class="form-control">
            {!!Form::open(['method' => 'GET', 'route' => ['searchHotel']])!!}
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>City: </strong>
                    <div>
                        {!! Form::select('city_id' , ['Cities: ' => $cities], null, array('class' => 'form-control', 'placeholder' => "Select a city")) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Start date: </strong>
                    <div>
                        {!! Form::date('start_date', null, ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>End date: </strong>
                    <div>
                        {!! Form::date('end_date', null, ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Number of adults: </strong>
                    <div>
                        {!! Form::number('number_adults', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Number of children: </strong>
                    <div>
                        {!! Form::number('number_children', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Number of rooms: </strong>
                    <div>
                        {!! Form::number('number_room', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Submit</button>
            {!!Form::close()!!}
            <div class="row">
                @foreach($hotels as $hotel)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <p>Hotel: {{$hotel->name}}</p>
                                <p>Email: {{$hotel->email}}</p>
                                <p>Score: {{$hotel->score}}</p>
                                {!!Form::open(['method' => 'GET', 'route' => ['searchHotelRoom']])!!}
                                {!!Form::hidden('hotel_id', $hotel->id)!!}
                                {!!Form::hidden('start_date', $start_date)!!}
                                {!!Form::hidden('end_date', $end_date)!!}
                                {!!Form::hidden('number_room', $number_room)!!}
                                {!!Form::hidden('number_adults', $number_adults)!!}
                                {!!Form::hidden('number_children', $number_children)!!}
                                <button type="submit" class="btn btn-xs btn-primary">Rooms</button>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>
@endsection