@extends('despevago.materialize')

@section('title', 'Actiity Search')

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

                @if (session('status'))
                    <div class="alert alert-warning" role="alert">
                        <p>{{ session('status') }}</p>
                    </div>
                @endif

                <span class="card-title valign center"><h5 class="mb-1 mt-0">Find your activity</h5></span>
                
                <form method="POST" action="{{ route('activitiesByCity')}}" autocomplete = "off">
                    @csrf
                    <div class="form-group">
                        {!!Form::open(['method' => 'get', 'route' => ['searchCarCompanies'], "autocomplete" => "off"])!!}
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="input-field col s6">
                                    <input onblur="if(this.value != '') { this.value = ''; }" placeholder="Enter a city" type="text" id="departure_city" class="autocomplete" name="city" required>
                                    <label for="departure_city">City</label>
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

    $(document).ready(function(){

        $('input.autocomplete').autocomplete(
            {
                data: {!! $citiesName !!},
            });
        $('select').formSelect();
    });
</script>
@endsection

        