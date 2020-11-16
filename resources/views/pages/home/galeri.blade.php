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
            <div>
                <div class="container py-5">
                    <h5>
                        Galeri
                    </h5>
                    <div class="small">
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