@extends('despevago.auth')

@section('title', 'Crear Hotel')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 form-elegant">
                <div class="card mb-3">
                    <div class="card-body mx-4">

                        {!!  Form::open(['route' => 'hotels.store',  'files' => true]) !!}

                        {!! Form::token(); !!}

                        <div class="text-center">
                            <h3 class="dark-grey-text mb-5"><strong>{{ __('Crear Hotel') }}</strong></h3>
                        </div>

                        <div class="md-form">
                            {!! Form::label('name', 'Nombre'); !!}
                            {!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required')); !!}
                            @include('common.errors', ['name' => 'name'])
                        </div>

                        <div class="md-form">
                            {!! Form::label('email', 'E-mail'); !!}
                            {!! Form::email('email', null, array('class' => 'form-control', 'required' => 'required')); !!}
                            @include('common.errors', ['name' => 'email'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Descripción'); !!}
                            {!! Form::textarea('description', null, array('class' => 'form-control', 'required' => 'required', 'placeholder' => "Ingrese una breve descripción de su hotel")); !!}
                            @include('common.errors', ['name' => 'description'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('city_id', 'Ciudad'); !!}
                            {!! Form::select('city_id', ["Ciudades" => $cities],null, array('class' => 'form-control', 'placeholder' => "Seleccione una ciudad")) !!}
                            @include('common.errors', ['name' => 'city_id'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('hotel_image', 'Imagen del hotel'); !!}
                            {!! Form::file('hotel_image', array('class' => 'form-control', 'required' => 'required'));!!}
                            @include('common.errors', ['name' => 'hotel_image'])
                        </div>


                        <div class="text-center mb-3">
                            {!! Form::button('Crear Hotel', array('class' => 'btn blue darken-4 btn-rounded btn-block', 'type' => 'submit')); !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('common.matchpass')
@endsection
