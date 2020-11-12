<?php

namespace App\View\Components;

use App\Kegiatan;
use Illuminate\View\Component;

class GridKegiatan extends Component{

    private $kegiatan;

    public function __construct($jenis = null){
        $this->kegiatan = Kegiatan::when(request()->filled('q'), function($query){
            $search = request('q');
            $query->where('nama_kegiatan', 'like', "%{$search}%");
        })
        ->when(request()->filled('id_bidang'), function($query){
            $query->where('id_bidang', request('id_bidang'));
        })
        ->when($jenis, function($query, $jenis){
            if($jenis == 'baru'){
                $query->whereRaw("DATE(tanggal) >= NOW()");
            } elseif($jenis == 'lama'){
                $query->whereRaw("DATE(tanggal) < NOW()");
            }
        })
        ->orderBy('tanggal', 'DESC')
        ->get();
    }

    public function render(){
        return view('components.grid-kegiatan', [
            'kegiatan'  => $this->kegiatan
        ]);
    }
}
