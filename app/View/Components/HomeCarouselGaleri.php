<?php

namespace App\View\Components;

use App\Kegiatan;
use Illuminate\View\Component;

class HomeCarouselGaleri extends Component{
    
    private $galeri;
    
    public function __construct(){
        $this->galeri = Kegiatan::whereNotNull('gambar')->limit(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render(){
        return view('components.home-carousel-galeri', [
            'galeri' => $this->galeri,
        ]);
    }
}
