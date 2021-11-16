@extends('adminlte::page', ['iFrameEnabled' => true])

@section('content_header')

@stop

@section('content')
    <p>Home</p>
@stop

@section('footer')
    <small>Copyright &copy; 2020-2021 - <strong>Rancho do Sossego</strong></small>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
        body { overflow-y: hidden; }
    </style>
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
