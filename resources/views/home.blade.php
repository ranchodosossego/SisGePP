@extends('adminlte::page', ['iFrameEnabled' => true])

@section('content_header')
<!DOCTYPE html>
@stop

@section('content')
    <p>Home</p>
@stop

@section('footer')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
        body {
            overflow-y: hidden;
        }

        .main-footer {
            display: none;
        }

    </style>
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
