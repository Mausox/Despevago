@extends('despevago.materialize')

@section('title', 'Find your flight')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    <div class="col 12">
        <div class="card mt-5">
            <div class="card-content">
                <span class="card-title valign center"><h5 class="mb-1 mt-0">Find your flight</h5></span>
                
                {{-- Radio group 1--}}
                <form method="POST" action="#">
                    @csrf 
                    <div class="row pad-3 mb-5">
                        <label class="mr-5">
                            <input id="round_trip" name="group1" type="radio" checked/>
                            <span>Round trip</span>
                        </label>

                        <label class="mr-5">
                            <input id="one_way" name="group1" type="radio"/>
                            <span>One way</span>
                        </label>

                        <label class="mr-5">
                            <input id="multi_city" name="group1" type="radio"/>
                            <span>Multi city</span>
                        </label>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">flight_takeoff</i>
                            <input placeholder="Enter a city" type="text" id="departure_city" class="autocomplete" name="departure_city">
                            <label for="departure_city">Departure</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">flight_land</i>
                            <input placeholder="Enter a city" type="text" id="arrival_city" class="autocomplete" name="arrival_city">
                            <label for="arrival_city">Arrival</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" class="departure_datepicker" id="departure_date" name="departure_date">
                                <label for="departure_date">Departure Date</label>
                            </div>

                        <div class="input-field col s6" id="one-way-div">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" class="arrival_datepicker" id="arrival_date" name="arrival_date">
                            <label for="arrival_date">Arrival Date</label>
                        </div>
                    </div>  
                    
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">group</i>
                            <select id="passengers">
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
                        <div class="input-field col s6">
                            <i class="material-icons prefix">airline_seat_recline_normal</i>
                            <select id="class_type">
                                <option value="" disabled selected>Choose your class</option>
                                <option value="1">Tourist</option>
                                <option value="2">Bussines</option>
                                <option value="3">First class</option>
                            </select>
                            <label>Class</label>
                        </div>
                    </div>
                </form>         
            </div>
            {{-- Submit--}}
            <div class="card-action">
                <div class="row mb-0">
                    <a type="submit" onclick="isChecked()" class="right blue darken-4 waves-effect waves-light btn"><i class="material-icons left">search</i>Search Flight</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("#one-trip").hide();

        $('.arrival_datepicker').datepicker({
            format: 'yyyy-mm-dd',
        });
            
        $('.departure_datepicker').datepicker({
            format: 'yyyy-mm-dd',
            minDate: new Date({{ $yyyy }},{{ $mm }}, {{$dd}}),
        });

        $('input.autocomplete').autocomplete(
        {
            data: {!! $citiesName !!},
        });
        $('select').formSelect();
    });
    
    $('.departure_datepicker').change(function() 
    {
        const [year, month, day] = $('.departure_datepicker').datepicker({ format: 'yyyy-mm-dd', minDate: new Date({{ $yyyy }},{{ $mm }}, {{$dd}})}).val().split("-");
        var departure_date = new Date(year, month-1, day-(-1));
        $( ".arrival_datepicker" ).datepicker({
            format: 'yyyy-mm-dd',
            minDate: departure_date,
        }).val(year+'-'+month+'-'+(day-(-1)));
    });

    var arrival_date = document.getElementById("arrival_date");
    var hidden_arrival = document.getElementById("one-way-div");
    $("#one_way").click(function() 
    {  
        if($("#one_way").is(':checked')) 
        {  
            $("#arrival_date").prop('disabled', true);
            hidden_arrival.classList.add("hide");
        }
    });  
    $("#round_trip").click(function() 
    {  
        if($("#round_trip").is(':checked')) 
        {  
            $("#arrival_date").prop('disabled', false);
            hidden_arrival.classList.remove("hide");
        }
    });  
    $("#multi_city").click(function() 
    {  
        if($("#multi_city").is(':checked')) 
        {  
            $("#arrival_date").prop('disabled', false);
            hidden_arrival.classList.remove("hide");
        }
    }); 
  
</script>
@endsection



