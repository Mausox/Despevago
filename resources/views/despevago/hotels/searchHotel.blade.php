@extends('despevago.app')

@section('title', 'Hotel Search')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

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
        </div>
    </div>
@endsection

