<div class="table-responsive">
    <table class="table table-bordered table-grid">
        <thead>
            <th>
                <small>
                    No.
                </small>
            </th>
            <th>
                <small>
                    Nama
                </small>
            </th>
            <th colspan="2">
                <small>
                    NIP
                </small>
            </th>
            <th>
                <small>
                    Pangkat
                </small>
            </th>
            <th>
                <small>
                    Bidang
                </small>
            </th>
        </thead>
        <tbody>
            @forelse ($petugas as $number => $item)
                <tr>
                    <td>
                        {{ $number+1 }}
                    </td>
                    <td>
                        @php
                            $nama = $item->nama;
                            if(request()->filled('q')){
                                $search = request('q');
                                $nama = preg_replace("/({$search})/im", "<span class='bg-warning'>$1</span>", $nama);
                            }
                        @endphp
                        {!! $nama !!}
                    </td>
                    <td>
                        <div class="small text-muted">
                            {{ $item->nip }}
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                            @if($item->status == 'PNS')
                                <span style="color: var(--pink)">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                </span>
                            @else
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                </svg>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="small text-muted">
                            {{ $item->pangkat }}
                        </div>
                    </td>
                    <td>
                        <div class="small text-muted">
                            {{ $item->bidang->nama_bidang }}
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">
                        <div class="p-4">
                            <div class="alert bg-warning shadow">
                                <div>
                                    Tidak ada data
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>