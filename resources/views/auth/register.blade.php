@extends('despevago.auth')

@section('title', 'Register')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 form-elegant">
            <div class="card">
                <div class="card-body mx-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="text-center">
                            <h3 class="dark-grey-text mb-5"><strong>{{ __('Sign up') }}</strong></h3>
                        </div>

                        <div class="md-form">
                            <label for="first_name">First name</label>
                            <input id="first_name" type="text" class="form-control {{ $errors->has('first_name') ? 'invalid is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>                           
                            @include('common.errors', ['name' => 'first_name'])
                        </div>

                        <div class="md-form">
                            <label for="last_name">Last name</label>
                            <input id="last_name" type="text" class="form-control {{ $errors->has('last_name') ? 'invalid is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required>                           
                            @include('common.errors', ['name' => 'last_name'])
                        </div>

                        <div class="md-form">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'invalid is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @include('common.errors', ['name' => 'email'])
                        </div>
                        
                        <div class="md-form">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control {{ $errors->has('password') ? 'invalid is-invalid' : '' }}" name="password" required>
                            <label id="password_match"></label>
                            @include('common.errors', ['name' => 'password'])

                        </div>

                        <div class="md-form">
                            <label for="password_confirm">Confirm Password</label>
                            <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        
                        <div class="md-form">
                            <label for="telephone">Telephone</label>
                            <input id="telephone" type="text" class="form-control{{ $errors->has('telephone') ? 'invalid is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" required>                           
                            @include('common.errors', ['name' => 'telephone'])
                        </div>

                        <div class="md-form pb-3">
                            <label for="address">Address</label>
                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? 'invalid is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>                           
                            @include('common.errors', ['name' => 'address'])
                        </div>

                        <div class="text-center mb-3">
                            <button type="submit" class="btn blue-gradient btn-rounded btn-block">{{ __('Sign up') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('common.matchpass')
@endsection
