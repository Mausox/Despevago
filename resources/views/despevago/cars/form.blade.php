<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Brand: </strong>
            {!! Form::text('brand', null, ['placeholder' => 'Example: Mazda', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Model: </strong>
            {!! Form::text('model', null, ['placeholder' => 'Example: CX-5', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Type: </strong>
            {!! Form::text('type', null, ['placeholder' => 'Example: SUV', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Capacity: </strong>
            {!! Form::number('capacity', null, ['placeholder' => 'Capacity', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Price: </strong>
            {!! Form::number('price', null, ['placeholder' => 'Price', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Branch Office ID: </strong>
            {!! Form::select('branch_office_id', ["Branch Offices" => $branch_offices], null, array('class' => 'form-control', 'placeholder' => "Select a branch office")) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <a class="btn btn-xs btn-success" href="{{ route('cars.index') }}">Back</a>
        <button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
    </div>
</div>