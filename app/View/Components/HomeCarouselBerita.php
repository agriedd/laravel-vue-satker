<?php

namespace App\View\Components;

use App\Kegiatan;
use Illuminate\View\Component;

class HomeCarouselBerita extends Component{

    private $kegiatan_terbaru;

    public function __construct(){
        $this->kegiatan_terbaru = Kegiatan::orderBy('tanggal', 'DESC')->limit(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render(){
        return view('components.home-carousel-berita', [
            'kegiatan'  => $this->kegiatan_terbaru
        ]);
    }
}
