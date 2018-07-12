@extends('despevago.auth')

@section('title', 'Reset password')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 form-elegant">
            <div class="card mb-3">
                <div class="card-body mx-4">

                    <input type="hidden" name="token" value="{{ $token }}">

                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf
                        <div class="text-center">
                            <h3 class="dark-grey-text mb-5"><strong>{{ __('Reset Password') }}</strong></h3>
                        </div>

                        <div class="md-form">
                            <label for="email">Your email</label>
                            <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'invalid is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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

                        <div class="text-center mb-3">
                            <button type="submit" class="btn blue darken-4 btn-rounded btn-block">{{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @include('common.matchpass')
@endsection
