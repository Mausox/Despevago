@extends('despevago.materialize')

@section('title', 'Find your activity')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
<div class="container">
    <div class="col 12">
        <div class="card mt-5">
            <div class="card-content">
                <span class="card-title valign center"><h5 class="mb-1 mt-0">Find your activity</h5></span>
                
                <form method="POST" action="{{ route('activitiesByCity')}}">
                    @csrf 
                    <div class="row ">
                        {!! Form::label('City', 'Select a city', ['class' => 'pad-3']); !!}
                        <div class="input-field col s12 pad-5 mt-0">
                            {!! Form::select('city_id', ["Select a city" => $citiesName], null, array('class' => 'mt-0')) !!}
                        </div>
                    </div>
                    </div>
                    {{-- Submit--}}
                    <div class="card-action">
                        <div class="row mb-0">
                            <button class="right blue darken-4 waves-effect waves-light btn" type="submit" name="action">Search Activity<i class="material-icons left">search</i>
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('select').formSelect();
    });  
</script>
@endsection

        