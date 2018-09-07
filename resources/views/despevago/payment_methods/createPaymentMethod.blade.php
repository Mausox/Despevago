@extends('despevago.materialize')

@section('title', 'Create payment method')
@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    {!!Form::open(['route' => ['payment_methods.store']])!!}
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whooops!</strong> You must fill all the fields before sumbiting.<br>
        </div>
    @endif

    <div class="card-panel mt-5">
        <div class="col s12 m5 l6">
            <span class="card-title valign center"><h5 class="mb-1 mt-0">Creating a payment method</h5></span>
            <div class="row">
                {!! Form::label('Card name', 'Select a card', ['class' => 'pad-3']); !!}
                <div class="input-field col s12 pad-5 mt-0">
                    {!! Form::select('card_name' , ['Visa' => 'Visa', 'MasterCard' => 'Master Card', 'DiscoverCard' => 'Discover Card', 'American Express' => 'American Express'], null, array('class' => 'mt-0')) !!}
                </div>  
            </div>
            <div class="row">
                {!! Form::label('Account number', 'Insert your account number', ['class' => 'pad-3']); !!}
                <div class="input-field col s12 pad-5 mt-0">
                    {!! Form::text('account_number', null, ['placeholder' => 'Insert your account number', 'class' => 'form-control']) !!}
                </div>  
            </div>
            <div class="row">
                {!! Form::label('Expiration date', 'Expiration date', ['class' => 'pad-3']); !!}
                <div class="input-field col s12 pad-5 mt-0">
                    {!! Form::date('expiration_date', null, ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
                </div>  
            </div>
            <div class="card-action">
                <div class="row mb-0">
                    <button class="right blue darken-4 waves-effect waves-light btn" type="submit" name="action">Add payment method<i class="material-icons left">add</i>
                    </button>
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