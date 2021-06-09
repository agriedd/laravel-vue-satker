<div class="card shadow-lg border-0 mx-auto" style="max-width: 375px; border-radius: .5rem; min-height: 75vh">
    @if($petugas)
        <div class="card-body" style="max-height: 200px">
            <div class="h-100 d-flex flex-column align-items-center justify-content-center" style="height: 200px; color: var(--light)">
                <svg xmlns="http://www.w3.org/2000/svg" width="5rem" height="5rem" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                </svg>
            </div>
        </div>
        <div class="card-body">
            <div>
                @php
                    $nama = $petugas->nama;
                    if(request()->filled('q')){
                        $search = request('q');
                        $nama = preg_replace("/({$search})/im", "<span class='bg-warning'>$1</span>", $nama);
                    }
                @endphp
                <small class="text-muted">
                    Nama
                </small>
                <h3>
                    {!! $nama !!}
                </h3>
            </div>
            <div>
                @if($petugas->status)
                <small class="text-muted">
                    NIP
                </small>
                <h5>
                    <div>
                        {{ $petugas->nip }}
                    </div>
                </h5>
                @endif
            </div>
            <div>
                <small class="text-muted">
                    Status Pegawai
                </small>
                <h6>
                    {{ $petugas->status }}
                </h6>
            </div>
            <div>
                <small class="text-muted">
                    Pangkat Pegawai
                </small>
                <div>
                    {{ $petugas->pangkat }}
                </div>
            </div>
            <div>
                <small class="text-muted">
                    Bidang
                </small>
                <div>
                    {{ $petugas->bidang->nama_bidang }}
                </div>
            </div>
            <div>
                <small class="text-muted">
                    Alamat
                </small>
                <div>
                    {{ $petugas->alamat }}
                </div>
            </div>
        </div>
    @else
        <div class="p-4">
            <div class="alert bg-warning shadow">
                <div>
                    Tidak ada data
                </div>
            </div>
        </div>
    @endif
</div>