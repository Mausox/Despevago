<div class="container">
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Start date: </strong>
            {!! Form::date('start_date', null, ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Start hour: </strong>
            <div>
                <input type="time" id="start_hour" name="start_hour" class="form-control" required />
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Price: </strong>
            {!! Form::text('price', null, ['placeholder' => '$', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Route: </strong>
            {!! Form::select('route',['from airport to hotel' => 'Airport to hotel', 'from hotel to airport' => 'Hotel to airport'], null, array('class' => 'form-control'))!!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Hotel: </strong>
            {!! Form::select('hotel_id' , ['Hotels: ' => $hotels], null, array('class' => 'form-control', 'placeholder' => "Select a hotel")) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Airport: </strong>
            {!! Form::select('airport_id' , ['Airports: ' => $airports], null, array('class' => 'form-control', 'placeholder' => "Select a airport")) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Transfer car: </strong>
            {!! Form::select('transfer_car_id' , ['Transfer cars: ' => $transfer_cars], null, array('class' => 'form-control', 'placeholder' => "Select a car for the transfer")) !!}
        </div>
    </div>

    <a class="btn btn-md btn-success" href="{{ route('transfers.index') }}">Back</a>
    <button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>

</div>