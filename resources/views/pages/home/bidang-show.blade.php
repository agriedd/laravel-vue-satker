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
        <div class="home-grid--banner-full p-3" style="background-color: var(--secondary-color)">
            <div class="container mb-5 bg-white shadow-lg rounded-lg p-0 card">
                <div class="p-0">
                    <div class="d-flex">
                        <div class="p-3">
                            <div class="d-flex flex-column justify-content-center h-100">
                                <a href="{{ route('home.bidang') }}" class="btn btn-sm px-3 py-2 btn-dark rounded-pill">
                                    <div class="d-flex">
                                        <div class="pr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            Kembali
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="container text-center flex-grow-1">
                            <div class="d-flex flex-column justify-content-center h-100">
                                <h5 class="m-0">
                                    Bidang
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="m-0">
                <div class="container py-0 d-flex" style="min-height: 70vh">
                    <div class="row">
                        <div class="col-lg-4 main-info-bidang py-3 h-100">
                            <div>
                                <h5>
                                    {{ $bidang->nama_bidang }}
                                </h5>
                            </div>
                            <div>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor at, nulla consectetur blanditiis vero nam facere. Sit qui aut temporibus in quo deleniti tenetur optio delectus. Iste expedita maxime voluptates.
                            </div>
                        </div>
                        <div class="col-lg-8 px-0 py-3 h-100">
                            <nav>
                                <div class="nav nav-tabs px-3" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Info Bidang</a>
                                    <a class="nav-item nav-link" id="nav-pegawai-tab" data-toggle="tab" href="#nav-pegawai" role="tab" aria-controls="nav-pegawai" aria-selected="false">Pegawai</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Kegiatan</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    
                                    {!! $bidang->visi_misi !!}

                                </div>
                                <div class="tab-pane fade p-3" id="nav-pegawai" role="tabpanel" aria-labelledby="nav-pegawai-tab">
                                    <x-table-petugas :bidang="$bidang->id_bidang"></x-table-petugas>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <x-grid-kegiatan :jenis="null" :bidang="$bidang->id_bidang"></x-grid-kegiatan>
                                </div>
                            </div>
                        </div>
                    </div>
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