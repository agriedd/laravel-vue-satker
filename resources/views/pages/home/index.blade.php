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
        <div class="home-grid--banner">
            <div class="container h-100">
                <x-home-banner></x-home-banner>
            </div>
        </div>
        <div class="home-grid--item-1">
        </div>
        <div class="home-grid--item-2">
            
        </div>
        <div class="home-grid--item-3">
            <div class="p-3 h-100 d-flex justify-content-center flex-column h-100 text-white">
                <div>
                </div>
            </div>
        </div>
        <div class="home-grid--item-4 position-sticky" style="top: 0px">
            <div class="p-3 h-100 d-flex justify-content-center flex-column h-100">
                <div>
                    <div class="small text-muted">
                        Hubungi Kami:
                    </div>
                    <ul>
                        <li>
                            +62 000000
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <a href="#" @click.prevent="prevSlide()" class="home-grid--action-prev d-none d-sm-block bg-dark text-light text-decoration-none" style="border-radius: .5rem 0 0 0">
            <div class="h-100 d-flex flex-column justify-content-center text-center small">
                Previous
            </div>
        </a>
        <a href="#" @click.prevent="nextSlide()" class="home-grid--action-next d-none d-sm-block bg-dark text-light text-decoration-none" style="border-radius: 0 .5rem 0 0">
            <div class="h-100 d-flex flex-column justify-content-center text-center small">
                Next
            </div>
        </a>
        <div class="home-grid--content pt-5 bg-white pb-4 px-4">
            <div class="container">
                <div class="display-6 font-weight-bold mb-4">
                    Selamat datang di Website Dinas Pekerjaan Umum dan Perumahan Rakyat Satuan Kerja Wilayah 1 Provinsi Nusa Tenggara Timur
                </div>
                <div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis odio impedit alias quibusdam. Non nemo deleniti illum, incidunt unde facilis reiciendis hic, facere dolore ipsum distinctio earum. Laudantium, explicabo dolor.
                    </p>
                </div>
            </div>
        </div>
        <div class="home-grid--content-cover">
            <div class="d-flex flex-column position-relative overflow-hidden" style="max-height: 100vh">
                <div class="position-absolute h-100 w-100 d-flex flex-column justify-content-center" style="top: 0px; left: 0px; background-color: rgba(0,0,0,.5)">
                    <div class="text-white p-4 mx-auto" style="max-width: 600px">
                        <h5 class="display-4 text-center">
                            Lorem ipsum dolor sit amet consectetur.
                        </h5>
                        <div>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laudantium ipsum velit reiciendis officiis repellat non, a explicabo rerum aliquid, provident temporibus commodi officia iusto, quod ullam ipsam consequuntur odio eligendi excepturi quam? Voluptatem saepe, voluptatibus laudantium aliquid, cupiditate modi ipsum ipsa officiis ullam voluptas architecto sunt! Beatae, incidunt corporis?
                        </div>
                    </div>
                </div>
                <img src="{{ asset('img/bg.jpg') }}" alt="" style="width: 100%">
            </div>
        </div>
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