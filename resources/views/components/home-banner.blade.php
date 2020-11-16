<div class="h-100 w-100">
    <div id="main-slide" class="carousel slide carousel-fade w-100 h-100 rounded shadow" data-ride="carousel">
        <div class="carousel-inner d-flex h-100 rounded shadow-lg">
            <ol class="carousel-indicators" style="right: unset; margin: 1rem; transform: rotate(90deg) translateX(-100%); transform-origin: bottom left;">
                <li data-target="#carouselExampleSlidesOnly" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleSlidesOnly" data-slide-to="1"></li>
                <li data-target="#carouselExampleSlidesOnly" data-slide-to="2"></li>
            </ol>
            <div class="carousel-item active" style="background-image: url('{{ asset('img/bg.jpg') }}'); background-position: center;  background-attachment: fixed;">
                <div class="h-100 d-flex flex-column justify-content-center text-white p-4" style="max-width: 500px">
                    <h3 class="font-weight-bold">
                        Website Dinas Pekerjaan Umum dan Perumahan Rakyat Satuan Kerja Wilayah 1 Provinsi Nusa Tenggara Timur
                    </h3>
                </div>
            </div>
            <div class="carousel-item" style="background: #dee2e6 !important;">
                <div class="d-flex flex-column h-100">
                    <x-home-carousel-berita></x-home-carousel-berita>
                </div>
            </div>
            <div class="carousel-item" style="background: #dee2e6 !important;">
                <div class="d-flex flex-column h-100">
                    <x-home-carousel-galeri></x-home-carousel-galeri>
                </div>
            </div>
        </div>
    </div>
</div>