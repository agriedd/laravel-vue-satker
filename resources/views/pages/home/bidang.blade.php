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
            <div class="p-3 position-sticky" style="top: 0px; z-index: 2">
                <div class="container">
                    <form action="" method="GET">
                        <input type="search" class="form-control w-100 p-3 shadow" placeholder="Temukan Bidang..." name="q" value="{{ request('q') }}">
                    </form>
                </div>
            </div>
            <div>
                <div class="container py-5">
                    <h5>
                        Daftar Bidang
                    </h5>
                    <div class="small">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente accusantium delectus veritatis officiis at ex eos provident pariatur necessitatibus corrupti, illum sit tempora laudantium! Nesciunt neque eum repellat eligendi aliquid!
                    </div>
                </div>
            </div>
            <x-grid-bidang></x-grid-bidang>
        </div>
    </div>
@endsection
@push('css')
    <style></style>
@endpush
@push('js')
@endpush