@extends('despevago.auth')

@section('title', 'Change Password')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 form-elegant">
                <div class="row mb-0">
                    <a class="mt-3 blue darken-4 waves-effect waves-light btn-small" href="{{ route('user.profile')}}"><i class="material-icons left">keyboard_arrow_left</i>Back</a>
                </div>

                <div class="card mb-3">
                    <div class="card-body mx-4">
                        <div class="text-center">
                            <h4 class="dark-grey-text mb-5"><strong>{{ __('Change Password  ') }}</strong></h4>
                        </div>

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form  method="POST" action="{{ route('changePassword') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <div class="md-form">
                                    <label for="current-password">Current Password</label>
                                    <input id="current-password" type="password" class="form-control" name="current-password" required>

                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <div class="md-form">
                                    <label for="new-password">New Password</label>
                                    <input id="new-password" type="password" class="form-control" name="new-password" required>

                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="md-form">
                                    <label for="new-password-confirm">Confirm New Password</label>
                                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                </div>
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" class="btn blue darken-4 btn-rounded btn-block">{{ __('Change Password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection