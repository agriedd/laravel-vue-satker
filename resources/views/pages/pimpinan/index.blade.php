@extends('layouts.home', [
    'appjs'     => 'app-pimpinan.js',
    'appcss'    => 'app.css',
])
@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="token" content="{{ $user->api_token }}">
    <meta name="theme-color" content="#272727">
    <meta name="app_host" content="{{url('/')}}">
    <meta name="id_user" content="{{ auth()->user()->id }}">
@endpush
@push('css')
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/5.6.55/css/materialdesignicons.min.css" rel="stylesheet">
@endpush
@section('content')
    <div>
        <panel-pimpinan></panel-pimpinan>
    </div>
@endsection