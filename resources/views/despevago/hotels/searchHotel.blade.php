@extends('despevago.materialize')

@section('title', 'Hotel Search')

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
                    <span class="card-title align center"><h5 class="mb-1 mt-0">Search for an hotel</h5></span>
                    <div class="form-control">
                        {!!Form::open(['method' => 'GET', 'route' => ['searchHotel']])!!}
                        <div class="col-xs-12">
                            <div class="form-group">
                                {!! Form::label('City', 'Destination', ['class' => 'pad-3']); !!}
                                <div class="input-field col s12 pad-5 mt-0">
                                    {!! Form::select('city_id', ["Select a city" => $cities], null, array('class' => 'mt-0')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <strong>Start date: </strong>
                                <div>
                                    {!! Form::date('start_date', null, ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <strong>End date: </strong>
                                <div>
                                    {!! Form::date('end_date', null, ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <strong>Number of adults: </strong>
                                <div>
                                    {!! Form::number('number_adults', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <strong>Number of children: </strong>
                                <div>
                                    {!! Form::number('number_children', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <strong>Number of rooms: </strong>
                                <div>
                                    {!! Form::number('number_room', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row mb-0">
                                <button class="right blue darken-4 waves-effect waves-light btn" type="submit" name="action">Search Hotel<i class="material-icons left">search</i></button>
                                {!!Form::close()!!}
                            </div>
                        </div>
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