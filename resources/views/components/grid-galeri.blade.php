<div class="grid-galeri">
    @forelse ($kegiatan as $item)
        <div class="position-relative bg-dark overflow-hidden" style="background-image: url('{{ Storage::disk('public')->url($item->gambar) }}'); background-size: cover; background-position: center">
            <div class="h-100 w-100 position-absolute show-on-hover" style="background: rgba(0, 0, 0, .5)"></div>
            <div class="p-3 h-100 d-flex flex-column justify-content-end text-white main-content position-relative" style="z-index: 1">
                <div class="d-flex justify-content-between">
                    <div class="text-left">
                        <div class="small text-light">
                            Bidang: {{ optional($item->bidang)->nama_bidang }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        
    @endforelse
</div>