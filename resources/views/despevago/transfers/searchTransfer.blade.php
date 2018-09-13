@extends('despevago.materialize')

@section('title', 'Transfer Search')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
    <div class="container">

        <div class="card mt-5">

            @if (session('status'))
                <div class="alert alert-warning">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card-content">
                    <div class="form-control">
                    {!!Form::open(['method' => 'GET', 'route' => ['transfer.result']])!!}
                    <div class="row pad-3 mb-5">
                        <label class="mr-5">
                            <input id="route" name="route" type="radio" value="from airport to hotel" checked/>
                            <span>From airport to hotel</span>
                        </label>

                        <label class="mr-5">
                            <input id="route" name="route" type="radio" value="from hotel to airport"/>
                            <span>From hotel to airport</span>
                        </label>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('Hotel', 'Select a hotel', ['class' => 'pad-3']); !!}
                            <div class="input-field col s12 pad-5 mt-0">
                                {!! Form::select('hotel_id', ["Select a hotel" => $hotelsName], null, array('class' => 'mt-0')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('Airport', 'Select a airport', ['class' => 'pad-3']); !!}
                            <div class="input-field col s12 pad-5 mt-0">
                                {!! Form::select('airport_id', ["Select a airport" => $airportsName], null, array('class' => 'mt-0')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('Hotel', 'Number of people', ['class' => 'pad-3']); !!}
                            <div class="input-field col s12 pad-5 mt-0">
                                {!! Form::number('numberPeople', null, ['class' => 'form-control', 'required', 'min' => '1', 'max' => '8']) !!}
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="input-field col s6" id="one-way-div">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" class="datepicker" name="date" id="arrival_date" required>
                                <label for="arrival_date">Pick up date</label>
                            </div>

                            <div class="input-field col s6">
                                {!! Form::select('hour',['Pick up hour' => $timeInterval], null, ['class' => 'form-control' , 'required' => 'required']) !!}
                            </div>
                        </div>
                    <div class="card-action">
                        <div class="row mb-0">
                            <button class="right blue darken-4 waves-effect waves-light btn" type="submit" name="action">Search Transfer<i class="material-icons left">search</i></button>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });

        $('.datepicker').datepicker(
            {
                format: 'yyyy-mm-dd',
                minDate: new Date({{ $yyyy }},{{ $mm }}, {{$dd}}),
            });


    </script>


@endsection