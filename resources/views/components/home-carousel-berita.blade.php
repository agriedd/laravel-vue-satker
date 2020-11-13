<div class="grid-carousel-berita h-100">
    <div class="h-100 grid-carousel-berita--main bg-white p-lg-4 pt-lg-5 position-relative" style="background-image: url('{{ Storage::disk('public')->url($kegiatan->first()->gambar) }}'); background-size: cover; background-position: center">
        <div class="position-absolute h-100 w-100" style="background: rgba(0, 0, 0, .5); top: 0; left: 0;"></div>
        <div class="position-relative h-100 d-flex justify-content-end flex-column">
            <div class="text-justify w-100 text-white pl-lg-3 p-3">
                <h4 style="font-family: Roboto">
                    {{ $kegiatan->first()->nama_kegiatan }}
                </h4>
                <div class="small">
                    {{ $kegiatan->first()->tanggal->format('d M Y') }}
                </div>
                <div>
                    {{ $kegiatan->first()->rincian_kegiatan }}
                </div>
            </div>
        </div>
    </div>
    <div class="h-100 grid-carousel-berita--item-1 bg-white">
        <div class="card-body">
            <h5 class="font-weight-bolder text-dark">
                {{ optional($kegiatan->get(1))->nama_kegiatan }}
            </h5>
        </div>
        <div class="card-body">
            <div class="small text-muted">
                {{ optional($kegiatan->get(1))->tanggal->format('d M Y') }}
            </div>
            <div class="small">
                {{ optional($kegiatan->get(1))->rincian_kegiatan }}
            </div>
        </div>
    </div>
    <div class="h-100 grid-carousel-berita--item-2 bg-white">
        <div class="card-body">
            <h6>
                {{ optional($kegiatan->get(2))->nama_kegiatan }}
            </h6>
            <div class="small text-muted">
                {{ optional($kegiatan->get(2))->tanggal->format('d M Y') }}
            </div>
            <div class="small">
                {{ optional($kegiatan->get(2))->rincian_kegiatan }}
            </div>
        </div>
    </div>
    <div class="h-100 grid-carousel-berita--item-3 bg-white"></div>
    <a href="{{ route('home.kegiatan') }}" class="h-100 grid-carousel-berita--item-3 bg-warning text-dark text-decoration-none d-flex flex-column justify-content-center" data-toggle="tooltip" title="Lihat kegiatan lainnya">
        <div class="p-3 d-flex justify-content-between">
            <div class="mx-auto">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </div>
        </div>
    </a>
</div>