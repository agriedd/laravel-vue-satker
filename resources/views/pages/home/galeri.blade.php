@extends('layouts.home', [
    'theme_color' => '#fff', 
    'appjs' => 'home.js',
    'appcss' => 'home.css',
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
                <div class="container py-5 text-center" style="font-family: Roboto">
                    <div class="text-dark font-weight-bolder display-5">
                        Galeri
                    </div>
                    <div class="small text-muted">
                        Foto galeri kegiatan
                    </div>
                </div>
            </div>
            <x-grid-galeri></x-grid-galeri>
        </div>
    </div>
@endsection
@push('css')
    <style></style>
@endpush
@push('js')
@endpush