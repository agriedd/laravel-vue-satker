<?php

namespace App\View\Components;

use App\Petugas;
use Illuminate\View\Component;

class TablePetugas extends Component{
    private $petugas;
    
    public function __construct($bidang = null){
        $this->petugas = Petugas::when(request()->filled('q'), function($query){
            $search = request('q');
            $query->where('nama', 'like', "%{$search}%");
        })
        ->when(request()->filled('id_bidang'), function($query){
            $query->where('id_bidang', request('id_bidang'));
        })
        ->when($bidang != null, function($query)use($bidang){
            $query->where('id_bidang', $bidang);
        })
        ->get();
    }
    public function render(){
        if(request()->filled('q')){
            return view('components.table-info-petugas', [
                'petugas'   => $this->petugas[0]
            ]);
        }
        return view('components.table-petugas', [
            'petugas'   => $this->petugas
        ]);
    }
}
