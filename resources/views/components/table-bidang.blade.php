<div class="table-responsive">
    <table class="table table-grid">
        <thead>
            <th>
                No.
            </th>
            <th>
                Bidang
            </th>
            <th>
                Nama
            </th>
        </thead>
        <tbody>
            @forelse ($bidang as $number => $item)
                <tr>
                    <td>
                        {{ $number+1 }}
                    </td>
                    <td>
                        @php
                            $nama = $item->nama_bidang;
                            if(request()->filled('q')){
                                $search = request('q');
                                $nama = preg_replace("/({$search})/im", "<span class='bg-warning'>$1</span>", $nama);
                            }
                        @endphp
                        {!! $nama !!}
                    </td>
                    <td>
                        {{ optional($item->pimpinan)->nama }}
                    </td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
</div>