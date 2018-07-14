@extends('despevago.app')

@section('title', 'Despevago')

@section('header')
    @include('despevago.header')
@endsection

@section('content')
<div class="container with-navbar-top-fixed">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
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
