@extends('despevago.materialize')

@section('title', 'Hotel Search')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-primary" role="alert">
            <p>{{ session('status') }}</p>
        </div>
    @endif

    <div class="container">
        <div class="col 12">
            <div class="card mt-5">
                <div class="card-content">
                    <span class="card-title align center"><h5 class="mb-1 mt-0">Search for an hotel</h5></span>
                        <div class="form-group">
                            {!!Form::open(['method' => 'GET', 'route' => ['searchHotel']])!!}
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <div class="input-field col s6">
                                        <input placeholder="Enter a city" type="text" id="departure_city" class="autocomplete" name="city">
                                        <label for="departure_city">City</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">date_range</i>
                                    <input type="text" class="datepicker" name="start_date" id="departure_date">
                                    <label for="departure_date">Start Date</label>
                                </div>

                                <div class="input-field col s6" id="one-way-div">
                                    <i class="material-icons prefix">date_range</i>
                                    <input type="text" class="datepicker" name="end_date" id="arrival_date">
                                    <label for="arrival_date">End Date</label>
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
                            <div class="card-action">
                                <div class="row mb-0">
                                    <button class="right blue darken-4 waves-effect waves-light btn" type="submit" name="action">Search Hotel<i class="material-icons left">search</i></button>
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>
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

    $(document).ready(function(){

        $('input.autocomplete').autocomplete(
            {
                data: {!! $citiesName !!},
            });
        $('select').formSelect();
        $('.datepicker').datepicker(
            {
                format: 'yyyy-mm-dd',
                minDate: new Date({{ $yyyy }},{{ $mm }}, {{$dd}}),
            });
    });



</script>


@endsection