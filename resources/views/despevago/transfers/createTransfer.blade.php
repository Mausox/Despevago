@extends('despevago.app')

@section('title', 'Create transfer')

@include('despevago.headers.headerAuth')
@include('despevago.headers.headerMV')

@section('content')
<div class="container">
    {!! Form::open(['route' => 'transfers.store']) !!}
    @include('despevago.transfers.formTransfer')
    {!! Form::close() !!}
</div>

@endsection