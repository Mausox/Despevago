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
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whooops!</strong> You must fill all the fields before sumbiting.<br>
        </div>
    @endif

    <div class="card-panel mt-5">
        <div class="col s12 m5 l6">
            <span class="card-title valign center"><h5 class="mb-1 mt-0">Adding credit to your account</h5></span>
            <div class="row">
                {!! Form::label('Payment Method', 'Select a saved card', ['class' => 'pad-3']); !!}
                <div class="input-field col s12 pad-5 mt-0">
                    {!! Form::select('payment_method_id' , $payment_methods, null, array('class' => 'mt-0')) !!}
                </div>  
            </div>
            <div class="row">
                {!! Form::label('Amount', 'Amount you want to charge into your account', ['class' => 'pad-3']); !!}
                <div class="input-field col s12 pad-5 mt-0">
                    {!! Form::number('amount', null, ['placeholder' => 'Amount you want to charge into your account', 'class' => 'form-control']) !!}
                </div>  
            </div>
            <div class="card-action">
                <div class="row mb-0">
                    <button class="right blue darken-4 waves-effect waves-light btn" type="submit" name="action">Add amount<i class="material-icons left">attach_money</i>
                    </button>
                    {!! Form::close() !!}
                 <a class="blue darken-4 waves-effect waves-light btn" href="{{ route('user.profile') }}">Back</a>
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
</script>
@endsection