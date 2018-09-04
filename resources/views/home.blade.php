@extends('despevago.app')

@section('title', 'Despevago')

@include('despevago.headers.headerAuth')

@section('content')

    @if (session('status'))
        <div class="alert alert-danger text-center">
            <p>{{ session('status') }}</p>
            <img width="200px" height="100px" src="https://media.giphy.com/media/njYrp176NQsHS/giphy.gif"/>
        </div>
    @endif


<div class="container with-navbar-top-fixed">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if(Auth::user()->has_user_type('admin'))
                        <div>Admin</div>
                    @else
                        <div>User</div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
