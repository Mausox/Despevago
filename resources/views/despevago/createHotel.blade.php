@extends('despevago.auth')

@section('title', 'Crear Hotel')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 form-elegant">
                <div class="card mb-3">
                    <div class="card-body mx-4">
                        <form method="POST" action="{{ route('hotels.store') }}">
                            @csrf

                            <div class="text-center">
                                <h3 class="dark-grey-text mb-5"><strong>{{ __('Crear Hotel') }}</strong></h3>
                            </div>

                            <div class="md-form">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'invalid is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @include('common.errors', ['name' => 'name'])
                            </div>

                            <div class="md-form">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'invalid is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @include('common.errors', ['name' => 'email'])
                            </div>

                            <div class="md-form">
                                <label for="score">Score</label>
                                <input id="score" type="text" class="form-control{{ $errors->has('score') ? 'invalid is-invalid' : '' }}" name="score" value="{{ old('score') }}" required>
                                @include('common.errors', ['name' => 'score'])
                            </div>

                            <div class="md-form pb-3">
                                <label for="description">Description</label>
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? 'invalid is-invalid' : '' }}" name="description" value="{{ old('description') }}" required>
                                @include('common.errors', ['name' => 'description'])
                            </div>

                            <div class="md-form pb-3">
                                <label for="city_id">Ciudad</label>
                                <input id="city_id" type="text" class="form-control{{ $errors->has('city_id') ? 'invalid is-invalid' : '' }}" name="city_id" value="{{ old('city_id') }}" required>
                                @include('common.errors', ['name' => 'city_id'])
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" class="btn blue darken-4 btn-rounded btn-block">{{ __('Crear hotel') }}</button>
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
