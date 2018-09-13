@extends('despevago.materialize')

@section('title', 'Find your package')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    <div class="col 12">
        <span class="card-title valign"><h5 class="mb-1 mt-3">Find your package</h5></span>
        <hr class="mb-5">
        <div class="card mt-5">
            <div class="card-content">
                <span class="card-title valign center"><h5 class="mb-1 mt-0">Flight + Auto</h5></span>
                <div class="form-group">
                    {!!Form::open(['method' => 'GET', 'route' => ['packagesCar.cars'], "autocomplete" => "off"])!!}
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">flight_takeoff</i>
                            <input placeholder="Enter a city" type="text" id="departure_city" name="departure_city" class="autocomplete" required>
                            <label for="departure_city">Departure</label>
                        </div>
                        

                        <div class="input-field col s6">
                            <i class="material-icons prefix">flight_land</i>
                            <input placeholder="Enter a city" type="text" id="arrival_city" name="arrival_city" class="autocomplete" required>
                            <label for="arrival_city">Arrival</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" class="datepicker" id="departure_date" name="departure_date" required>
                            <label for="departure_date">Departure Date</label>
                        </div>

                        <div class="input-field col s6" id="one-way-div">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" class="datepicker" id="arrival_date" name="arrival_date" required>
                            <label for="arrival_date">Arrival Date</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">group</i>
                            <select id="passengers" name="passengers_number" required>
                                <option value="" disabled selected>Numbers of passenger</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                            <label>Passengers</label>
                        </div>

                    </div>
                        
                    {{-- Submit--}}
                    <div class="card-action">
                        <div class="row mb-0">
                            <button class="right blue darken-4 waves-effect waves-light btn" type="submit" name="action">Search Package<i class="material-icons left">search</i></button>
                        </div>
                    </div>

                    {!!Form::close()!!}

                </div>
            </div>
        </div>


        <div class="card mt-5">
            <div class="card-content">
                <span class="card-title valign center"><h5 class="mb-1 mt-0">Flight + Room</h5></span>
                <div class="form-group">
                    {!!Form::open(['method' => 'GET', 'route' => ['packagesRoomByCity'], "autocomplete" => "off"])!!}
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">flight_takeoff</i>
                            <input placeholder="Enter a city" type="text" id="departure_city" name="departure_city" class="autocomplete" required>
                            <label for="departure_city">Departure</label>
                        </div>
                        

                        <div class="input-field col s6">
                            <i class="material-icons prefix">flight_land</i>
                            <input placeholder="Enter a city" type="text" id="arrival_city" name="arrival_city" class="autocomplete" required>
                            <label for="arrival_city">Arrival</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" class="datepicker" id="departure_date" name="departure_date" required>
                            <label for="departure_date">Departure Date</label>
                        </div>

                        <div class="input-field col s6" id="one-way-div">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" class="datepicker" id="arrival_date" name="arrival_date" required>
                            <label for="arrival_date">Arrival Date</label>
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

                    {{-- Submit--}}
                    <div class="card-action">
                        <div class="row mb-0">
                            <button class="right blue darken-4 waves-effect waves-light btn" type="submit" name="action">Search Package<i class="material-icons left">search</i></button>
                        </div>
                    </div>

                    {!!Form::close()!!}

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
        

        $(document).on('focus', '.datepicker',function(){
            $(this).datepicker({
                todayHighlight:true,
                format:'yyyy-mm-dd',
                autoclose:true
            })
        });


    });

    function add(id){
		document.getElementById(id).style.visibility="visible";
	}

    function remove(id){
		document.getElementById(id).style.visibility="hidden";		
	}

    function disable(id){
		document.getElementById(id).disabled=true;
	}
</script>
@endsection