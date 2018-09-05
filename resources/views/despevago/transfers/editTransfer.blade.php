@extends('despevago.app')

@section('title', 'Editing transfer'.  $transfer->id)

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')

<div class="container">
    {!! Form::model($transfer ,['method' => 'PUT', 'route' => ['transfers.update', $transfer->id]]) !!}
    @include('despevago.transfers.formTransfer')
    {!! Form::close() !!}
</div>

@endsection