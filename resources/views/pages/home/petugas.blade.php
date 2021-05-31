@extends('layouts.home', [
    'theme_color' => '#fff', 
    'appjs' => 'home.js',
    'appcss' => 'home.css',
    'title' => 'Daftar Pegawai'
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
            <div class="p-3 position-sticky" style="top: 0px">
                <div class="container" style="max-width: 400px">
                    <form action="" method="GET">
                        <input type="search" class="form-control w-100 p-4 shadow" placeholder="Temukan Pegawai..." name="q" value="{{ request('q') }}">
                    </form>
                </div>
            </div>
            <div class="container">
                <x-info-bidang-get></x-info-bidang-get>
            </div>
            <div class="container">
                <x-table-petugas></x-table-petugas>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style></style>
@endpush
@push('js')
@endpush