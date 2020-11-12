@if($bidang)
    <div class="alert bg-warning">
        <div class="p-3">
            <h3 class="text-uppercase font-weight-bold">
                Bidang: {{ $bidang->nama_bidang }}
            </h3>
            <div class="small text-muted">
                Pimipinan: {{ $bidang->nama_kepala_b }}
            </div>
        </div>
    </div>
@endif