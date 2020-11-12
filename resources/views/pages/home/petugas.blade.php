@extends('layouts.home', [
    'theme_color' => '#fff', 
    'appjs' => 'home.js',
    'appcss' => 'home.css',
])

@section('content')
    <div class="home-grid">
        <div class="home-grid--container"></div>
        <div class="home-grid--navbar px-lg-4 px-md-2 d-flex navbar navbar-expand-lg">
            <x-home-navbar></x-home-navbar>
        </div>
        <div class="home-grid--sidebar text-dark bg-white shadow-sm">
            <x-home-sidebar></x-home-sidebar>
        </div>
        <div class="home-grid--banner-full" style="background-color: var(--secondary-color)">
            <div class="p-3">
                <div class="container">
                    <form action="" method="GET">
                        <input type="search" class="form-control w-100 p-lg-3" placeholder="Temukan Petugas..." name="q" value="{{ request('q') }}">
                    </form>
                </div>
            </div>
            <x-grid-petugas></x-grid-petugas>
        </div>
    </div>
@endsection
@push('css')
    <style></style>
@endpush
@push('js')
@endpush