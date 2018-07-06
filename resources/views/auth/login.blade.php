@extends('despevago.auth')

@section('title', 'Login')

@section('content')

<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-8 form-elegant">
            <div class="card">
                <div class="card-body mx-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf                    

                        <div class="text-center">
                            <h3 class="dark-grey-text mb-5"><strong>Sign in</strong></h3>
                        </div>
 
                        <div class="md-form">
                            <label for="email">Your email</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @include('common.errors', ['name' => 'email'])
                            
                        </div>

                        <div class="md-form pb-3">
                            <label for="password">Your password</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @include('common.errors', ['name' => 'password'])
                            <p class="font-small blue-text d-flex justify-content-end"><a href="{{ route('password.request') }}" class="blue-text ml-1">{{ __('Forgot Your Password?') }}</a></p>
                        </div>
            
                        <div class="text-center mb-3">
                            <button type="submit" class="btn blue-gradient btn-rounded btn-block">{{ __('Sign in') }}</button>
                        </div>

                        <div class="modal-footer pt-3 mb-1">
                            <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="{{ route('register') }}" class="blue-text ml-1"> Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
