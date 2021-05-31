@extends('layouts.home', [
    'theme_color' => '#fff', 
    'appjs' => 'home.js',
    'appcss' => 'home.css',
    'title' => 'Bidang'
])

@section('content')
    <div class="home-grid" style="background-image: url('{{ asset('img/bg.svg') }}'); background-position: top right; background-size: 90vw; background-repeat: no-repeat">
        <div class="home-grid--container"></div>
        <div class="home-grid--navbar px-lg-4 px-md-2 d-flex navbar navbar-expand-lg">
            <x-home-navbar></x-home-navbar>
        </div>
        <div class="home-grid--sidebar text-dark bg-white shadow-sm">
            <x-home-sidebar></x-home-sidebar>
        </div>
        <div class="home-grid--banner-full" style="background-color: var(--secondary-color)">
            <div>
                <div class="container py-5 text-center">
                    <h5>
                        Daftar Bidang
                    </h5>
                </div>
            </div>
            <div class="p-3 position-sticky" style="top: 0px; z-index: 2">
                <div class="container" style="max-width: 400px">
                    <form action="" method="GET">
                        <input type="search" class="form-control w-100 p-4 shadow" placeholder="Temukan Bidang..." name="q" value="{{ request('q') }}">
                    </form>
                </div>
            </div>
            <div class="container mb-5">
                <x-grid-bidang></x-grid-bidang>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style></style>
@endpush
@push('js')
@endpush