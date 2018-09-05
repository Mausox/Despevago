@extends('despevago.app')

@section('title', 'Search a car')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')

<div class="container">
    <div class="row">
        <h3>Search a car</h3>
    </div>


    @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whooops!</strong> There were some problems with your input.<br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
</div>

<div class="container">
    <div class="form-group col-lg-4 col-sm-6">
        {!! Form::open(['method' => 'POST','route'=>['branchOfficesByCity']]) !!}

        <label for="pick_up_location">Pickup Location</label>
        <br>
        <div class="form-group">
            {!! Form::select('city_id', ["Cities" => $citiesName], null, array('class' => 'form-control', 'placeholder' => "Select a city")) !!}
        </div>
        
        <div class="row">
            <div class="form-group col-lg-12">
                <label for="pick_up_date">Pick up date</label>
                <br>
                <div class='col-sm-8'>
                    <div class="form-group">
                        <div class='input-group date' id='pick_up_date'>
                            <input type='date' name="pick_up_date" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
                

        <div class="row">
            <div class="form-group col-lg-12">
                <label for="return_date">Return date</label>
                <br>
                <div class='col-sm-8'>
                    <div class="form-group">
                        <div class='input-group date' id='return_date'>
                            <input type="date" name="return_date" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-12">
                <label for="pick_up_time">Pick up time</label>
                <br>
                <div class='col-sm-8'>
                    <div class="form-group">
                        <div class='input-group time' id='pick_up_time'>
                            <input type='time' name="pick_up_time" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-12">
                <label for="return_time">Return time</label>
                <br>
                <div class='col-sm-8'>
                    <div class="form-group">
                        <div class='input-group time' id='return_time'>
                            <input type='time' name="return_time" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::button('Search', ['type' => 'submit', 'class' => 'btn btn-sm btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>


@endsection   
