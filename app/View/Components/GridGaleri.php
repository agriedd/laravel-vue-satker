<?php

namespace App\View\Components;

use App\Kegiatan;
use Illuminate\View\Component;

class GridGaleri extends Component
{
    private $kegiatan;
    public function __construct(){
        $this->kegiatan = Kegiatan::latest()->whereNotNull('gambar')->get();
    }

    public function render(){
        return view('components.grid-galeri', [
            'kegiatan'  => $this->kegiatan
        ]);
    }
}
