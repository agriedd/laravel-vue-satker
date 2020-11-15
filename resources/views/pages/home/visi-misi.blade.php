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
                    Visi Misi
                </div>
                <div>
                    <p>
                        Visi Kementerian Pekerjaan Umum dan Perumahan Rakyat;
                    </p>
                    <p>
                        Terwujudkan infrastruktur pekerjaan umum dan Perumahan Rakyat yang handal dalam mendukung Indonesian yang berdaulat, mandiri dan berkepribadian
                        berlandaskan gotong royong.
                    </p>
                </div>
                <div>
                    <p>
                        Misi Kementerian Pekerjaan Umum dan Perumahan Rakyat;
                    </p>
                    <ol>
                        <li>
                            Mempercepat pembangunan infrastruktur sumberdaya air, termasuk sumber daya maritim untuk mendukung
                             ketahanan air, kedaulatan pangan, dan kedaulatan energi, guna menggerakaran sektor-sektor strategis
                             ekonomi domestik dalam rangka kemandirian ekonomi.
                        </li>
                        <li>
                            Mempercepat pembangunan infrastruktur jalan untuk mendukung konektivitas guna meningkatkan produktivitas,
                            efisien, dan pelayanan sistem logistik nasional bagi penguatan daya saing bangsa di lingkup global yang befokus
                            pada keterpaduan konektivitas daratan dan maritim.
                        </li>
                        <li>
                            Mempercepat pembangunan pemukiman dan perumhahan rakyat
                            untuk mendukung layanan infrastruktur dasar yang layak dalam rangka
                            mewujudkan kualitas hidup manusia Indonesia sejalan dengan prinsip
                            'infrastruktur untuk semua'.
                        </li>
                        <li>
                            Mempercepat pembangunan infrastruktur pekerjaan umum dan perumahan rakyat secara terpadu dan pinggiran didukung 
                            industri konstruksi yang berkualitas untuk keseimbangan pembangunan antar-daerah, terutama di kawasan tertinggal,
                             kawasan perbatasan, dan kawasan perdesaan, dalam kerangka NKRI.
                        </li>
                        <li>
                            Meningkatkan kata kelola sumber daya organisasi bidang pekerjaan umum dan perumahan rakyat
                            yang meliputi sumber daya manusia, pengendalian dan pengawasan, kesekertariatan serta penelitian
                            dan pengembangan untuk mendukung fungsi manajemen meliputi perencanaan yang terpadu, pengorganisasian
                            yang efisien, pelaksanaan yang tepat, dan pengawasan yang ketat.
                        </li>
                    </ol>
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