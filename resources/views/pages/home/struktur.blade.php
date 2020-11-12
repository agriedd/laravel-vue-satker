@extends('layouts.home', [
    'theme_color' => '#fff', 
    'appjs' => 'home.js',
    'appcss' => 'home.css',
])

@section('content')
    <div class="home-grid">
        <div class="home-grid--container" style="min-height: 0px!important"></div>
        <div class="home-grid--navbar px-lg-4 px-md-2 d-flex navbar navbar-expand-lg">
            <x-home-navbar></x-home-navbar>
        </div>
        <div class="home-grid--sidebar text-dark bg-white shadow-sm">
            <x-home-sidebar></x-home-sidebar>
        </div>
        <div class="home-grid--content pt-5 bg-white pb-4 px-4">
            <div class="container">
                <div class="display-6 font-weight-bold mb-4">
                    Struktur Organisasi
                </div>
                <div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis odio impedit alias quibusdam. Non nemo deleniti illum, incidunt unde facilis reiciendis hic, facere dolore ipsum distinctio earum. Laudantium, explicabo dolor.
                    </p>
                </div>
            </div>
        </div>
        @if($struktur)
            <div class="home-grid--content-cover">
                <div class="d-flex flex-column position-relative overflow-hidden">
                    <img src="{{ Storage::disk('public')->url($struktur->gambar) }}" alt="" style="width: 100%">
                </div>
            </div>
        @endif
        <div class="home-grid--content bg-white py-4 px-4">
            <div class="container">
                <div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi animi quae fuga ullam dolores atque ex sequi, iure architecto quis blanditiis obcaecati explicabo temporibus sed iusto unde! Dolor, saepe nihil.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi animi quae fuga ullam dolores atque ex sequi, iure architecto quis blanditiis obcaecati explicabo temporibus sed iusto unde! Dolor, saepe nihil.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style></style>
@endpush
@push('js')
@endpush