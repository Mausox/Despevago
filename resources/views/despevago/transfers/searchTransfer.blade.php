@extends('despevago.materialize')

@section('title', 'Transfer Search')

@section('header')
    @include('despevago.headers.auth')
    @include('despevago.headers.middle-logo')
    @include('despevago.headers.menu ')
@endsection

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-control">
            {!!Form::open(['method' => 'GET', 'route' => ['transfer.result']])!!}
            <div class="row pad-3 mb-5">
                <label class="mr-5">
                    <input id="route" name="route" type="radio" value="from airport to hotel" checked/>
                    <span>From airport to hotel</span>
                </label>

                <label class="mr-5">
                    <input id="route" name="route" type="radio" value="from hotel to airport"/>
                    <span>From hotel to airport</span>
                </label>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::label('Hotel', 'Select a hotel', ['class' => 'pad-3']); !!}
                    <div class="input-field col s12 pad-5 mt-0">
                        {!! Form::select('hotel_id', ["Select a hotel" => $hotels], null, array('class' => 'mt-0')) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::label('Airport', 'Select a airport', ['class' => 'pad-3']); !!}
                    <div class="input-field col s12 pad-5 mt-0">
                        {!! Form::select('airport_id', ["Select a airport" => $airports], null, array('class' => 'mt-0')) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Number of people: </strong>
                    <div>
                        {!! Form::number('numberPeople', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Date: </strong>
                    <div>
                        {!! Form::date('date', null, ['placeholder' => 'YYYY-MM-DD', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Time: </strong>
                    <div>
                        {!! Form::time('hour', null, ['placeholder' => '00:00', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Submit</button>
            {!!Form::close()!!}
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