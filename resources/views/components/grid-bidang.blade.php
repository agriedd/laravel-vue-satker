<div class="grid-bidang" style="gap: 10px">
    @forelse ($bidang as $item)
        @php
            $nama = $item->nama_bidang;
            if(request()->filled('q')){
                $search = request('q');
                $nama = preg_replace("/({$search})/im", "<span class='bg-warning'>$1</span>", $nama);
            }
        @endphp
        <a href="{{ route('home.bidang.info', [ 'bidang' => $item->id_bidang ]) }}" class="position-relative bg-dark overflow-hidden rounded-lg" style="background-image: url('{{ Storage::disk('public')->url(optional($item->foto_kegiatan)->gambar) }}'); background-size: cover; background-position: center; overflow: hidden">
            <div class="h-100 w-100 position-absolute" style="background: rgba(0, 0, 0, .5)"></div>
            <div class="p-3 h-100 d-flex flex-column justify-content-center text-white main-content position-relative" style="z-index: 1">
                <div class="d-flex justify-content-between">
                    <div class="text-center mx-auto">
                        <div class="text-light">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-uppercase font-weight-bold">
                            {!! $nama !!}
                        </h3>
                        <div class="small text-light">
                            Pimipinan: {{ optional($item->pimpinan)->nama }}
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @empty
        
    @endforelse
</div>