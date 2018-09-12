@extends('despevago.materialize')

@section('title', 'Cars Search')

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
                    <span class="card-title align center"><h5 class="mb-1 mt-0">Search for a car</h5></span>
                    <div class="form-group">
                        {!!Form::open(['method' => 'get', 'route' => ['companiesSearch'], "autocomplete" => "off"])!!}
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="input-field col s6">
                                    <input onblur="if(this.value != '') { this.value = ''; }" placeholder="Enter a city" type="text" id="departure_city" class="autocomplete" name="city" required>
                                    <label for="departure_city">City</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">date_range</i>
                                <label for="departure_date">Start Date</label>
                                <input type="text" class="datepicker" name="start_date" id="departure_date" required>
                            </div>

                            <div class="input-field col s6">
                                {!! Form::select('start_hour',['Start Hours' => $timeInterval], null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6" id="one-way-div">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" class="datepicker" name="end_date" id="arrival_date" required>
                                <label for="arrival_date">End Date</label>
                            </div>

                            <div class="input-field col s6">
                                {!! Form::select('end_hour',['End Hours' => $timeInterval], null, ['class' => 'form-control' , 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="card-action">
                            <div class="row mb-0">
                                <button class="right blue darken-4 waves-effect waves-light btn" type="submit" name="action">Search Car<i class="material-icons left">search</i></button>
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