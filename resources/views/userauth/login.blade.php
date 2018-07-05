@extends('layouts.userauth')

@section('title', 'Login')

@section('content')

<div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-8 form-elegant">
                <div class="card">
                    <div class="card-body mx-4">
                        <!--Header-->
                        <div class="text-center">
                            <h3 class="dark-grey-text mb-5"><strong>Sign in</strong></h3>
                        </div>
            
                        <!--Body-->
                        <div class="md-form">
                            <input type="text" id="Form-email1" class="form-control">
                            <label for="Form-email1">Your email</label>
                        </div>
            
                        <div class="md-form pb-3">
                            <input type="password" id="Form-pass1" class="form-control">
                            <label for="Form-pass1">Your password</label>
                            <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#" class="blue-text ml-1"> Password?</a></p>
                        </div>
            
                        <div class="text-center mb-3">
                            <button type="button" class="btn blue-gradient btn-block waves-effect waves-light">Sign in</button>
                        </div>
                    </div>
    
                    <!--Footer-->
                    <div class="modal-footer mx-5 pt-3 mb-1">
                        <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="#" class="blue-text ml-1"> Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
