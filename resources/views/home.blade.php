@extends('adminlte::page', ['iFrameEnabled' => true])
@push('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
{{--
@include('layouts.app')


@section('content_header')

@stop

@section('content')
    <p>Home</p>
@stop

@section('footer')
@stop

@section('css')
    <link rel="stylesheet" href="/resources/css/app.css">
@stop

@section('js')

@stop --}}
