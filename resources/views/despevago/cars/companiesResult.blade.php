@extends('despevago.materialize')

@section('title', 'Companies result')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
    <div class="container">
        <div class="col 12">
            <div class="card mt-5">
                @if (session('status'))
                    <div class="alert alert-warning" role="alert">
                        <p>{{ session('status') }}</p>
                    </div>
                @endif
                <div class="row mb-0 pad-5">
                    <a class="mt-3 blue darken-4 waves-effect waves-light btn-small" href="{{ route('searchCarsForm')}}"><i class="material-icons left">keyboard_arrow_left</i>Back</a>
                </div>
                <div class="card-content">
                    <span class="card-title align center"><h5 class="mb-1 mt-0">Cars Companies in {{ $city->name }}</h5></span>
                    <div class="row 12">



                    @foreach ($branch_offices as $branch_office)
                            <div class="col s12 m6 l4 xl4">
                                <div class="card sticky-action">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="{{asset('img/default/companies_default.png')}}">
                                    </div>

                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4">{{ $branch_office->company->name }}<i class="material-icons right">more_vert</i></span>
                                    </div>
                                    <div class="card-reveal valign-wrapper">
                                        <span class="card-title grey-text text-darken-4">{{ $branch_office->company->name }}<i class="material-icons right">close</i></span>
                                        <br>
                                        <p><i class="left material-icons">directions_car</i> Cars Quantity: {{ $branch_office->cars->count() }}</p>
                                        <br>
                                        <p><i class="left material-icons">location_on</i> Address: {{ $branch_office->address }}</p>
                                        <br>
                                        <p><i class="left material-icons">call</i> Telephone: {{$branch_office->telephone}}</p>
                                        <br>
                                        <p><i class="left material-icons">alternate_email</i> Contact: {{ $branch_office->company->email }}</p>
                                        <br>
                                    </div>
                                    <div class="card-action">
                                        <div class="row mb-0">
                                            {!!Form::open(['method' => 'GET', 'route' => ['searchCars']])!!}
                                            {!!Form::hidden('branch_office_id', $branch_office->id)!!}
                                            {!!Form::hidden('start_date', $start_date)!!}
                                            {!!Form::hidden('end_date', $end_date)!!}
                                            {!!Form::hidden('start_hour', $start_hour)!!}
                                            {!!Form::hidden('end_hour', $end_hour)!!}
                                            <button type="submit" class="mt-3 blue darken-4 waves-effect waves-light btn-small"><i class="material-icons right">add</i>Available cars</button>
                                            {!!Form::close()!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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