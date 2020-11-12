<div class="grid-kegiatan">
    @forelse ($kegiatan as $item)
        @php
            $nama = $item->nama_kegiatan;
            if(request()->filled('q')){
                $search = request('q');
                $nama = preg_replace("/({$search})/im", "<span class='bg-warning'>$1</span>", $nama);
            }
        @endphp
        <div class="p-3 {{ $item->aktif ? 'border-left border-success' : null }}" style="border-left-width: .25rem!important">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>
                        {!! $nama !!}
                    </h5>
                    <div class="small">
                        Tanggal: {{ $item->tanggal->format('d M Y') }} 
                    </div>
                    <div class="text-muted">
                        {{ $item->tanggal->diffForHumans() }}
                    </div>
                    <div class="small py-3">
                        Lokasi: {{ $item->lokasi }}
                    </div>
                    <div class="small text-muted">
                        {{ $item->rincian_kegiatan }}
                    </div>
                    <div class="small text-muted pt-3">
                        Bidang: {{ $item->bidang->nama_bidang }}
                    </div>
                </div>
                <div>
                    <div class="text-muted pl-3">
                        @if($item->aktif)
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                        @else
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="p-3">
            <div class="alert h-100 rounded-lg">
                Belum Ada Kegiatan Terbaru
            </div>
        </div>
    @endforelse
</div>