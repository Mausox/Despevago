@extends('despevago.auth')

@section('title', 'Reset password')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 form-elegant">
            <div class="card mb-3">
                <div class="card-body mx-4">
                    @include('common.success', ['name' => 'status'])

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="text-center">
                            <h3 class="dark-grey-text mb-5"><strong>{{ __('Reset Password') }}</strong></h3>
                        </div>

                        <div class="md-form">
                            <label for="email">Your email</label>
                            <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'invalid is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @include('common.errors', ['name' => 'email'])

                        </div>

                        <div class="text-center mb-3">
                            <button type="submit" class="btn blue-gradient btn-rounded btn-block">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
