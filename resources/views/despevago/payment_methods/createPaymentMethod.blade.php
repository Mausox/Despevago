@extends('despevago.materialize')

@section('title', 'Create payment method')
@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    <hr>
    <h1>Creating a payment method</h1>
    <div class="form-control">
        {!!Form::open(['route' => ['payment_methods.store']])!!}
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whooops!</strong> You must fill all the fields before sumbiting.<br>
            </div>
        @endif
        <div class="col-xs-12">
            <div class="form-group">
                <strong>Card Name: </strong>
                <div>
                    {!! Form::select('card_name' , ['Visa' => 'Visa', 'MasterCard' => 'Master Card', 'DiscoverCard' => 'Discover Card', 'American Express' => 'American Express'], null, array('class' => 'form-control', 'placeholder' => "Insert the name of your card")) !!}
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <strong>Account number: </strong>
                <div>
                    {!! Form::text('account_number', null, ['placeholder' => 'Inser your account number', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <strong>Expiration date: </strong>
                <div>
                    {!! Form::date('expiration_date', null, ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-xs btn-primary">Submit</button>
        {!! Form::close() !!}
        <a class="btn btn-md btn-success" href="{{ route('user.profile') }}">Back</a>
    </div>
</div>

@endsection