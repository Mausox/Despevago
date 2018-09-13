@extends('despevago.materialize')

@section('title', 'Editing user'.  $user->name)


@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection


@section('content')

    <div class="container">
        @if(count($errors) > 0)

            <div class="alert alert-danger">
                <div class="card red darken-1">
                    <strong>Whooops!</strong> All fields must be filled<br>
                </div>
            </div>
        @endif
        <div class="row mb-0 pad-5">
            <a class="mt-3 blue darken-4 waves-effect waves-light btn-small" href="{{ route('user.profile')}}"><i class="material-icons left">keyboard_arrow_left</i>Back</a>
        </div>
        {!! Form::model($user ,['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
        <div class="card-panel">
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Email: </strong>
                    {!! Form::email('email', null, ['placeholder' => 'email@gmail.com', 'class' => 'form-control', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::hidden('password', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>First name: </strong>
                    {!! Form::text('first_name', null, ['placeholder' => '', 'class' => 'form-control','required']) !!}
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Last name: </strong>
                    {!! Form::text('last_name', null, ['placeholder' => '', 'class' => 'form-control','required']) !!}
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Telephone: </strong>
                    {!! Form::text('telephone', null, ['placeholder' => '', 'class' => 'form-control','required']) !!}
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Address: </strong>
                    {!! Form::text('address', null, ['placeholder' => '', 'class' => 'form-control','required']) !!}
                </div>
            </div>
            <hr>
            {!! Form::button('Submit', ['type' => 'submit', 'class' => 'blue darken-4 waves-effect waves-light btn']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection