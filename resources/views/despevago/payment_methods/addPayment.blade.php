@extends('despevago.materialize')

@section('title', 'Payment')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    {!!Form::open(['route' => ['paymentAdd']])!!}
    <hr>
    <h1> Adding credit to your account</h1>
    <div class="form-control">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whooops!</strong> You must fill all the fields before sumbiting.<br>
            </div>
        @endif
        <div class="col-xs-12">
            <div class="form-group">
                <strong>Payment Method: </strong>
                <div>
                    {!! Form::select('payment_method_id' , $payment_methods, null, array('class' => 'form-control', 'placeholder' => "Insert the name of your payment method")) !!}
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <strong>Amount: </strong>
                <div>
                    {!! Form::number('amount', null, ['placeholder' => 'Amount you want to charge into your account', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-xs btn-primary">Submit</button>
        {!! Form::close() !!}
        <a class="btn btn-md btn-success" href="{{ route('user.profile') }}">Back</a>
    </div>
</div>
@endsection