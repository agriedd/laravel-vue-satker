<?php

namespace App\View\Components;

use App\Petugas;
use Illuminate\View\Component;

class GridPetugas extends Component{

    private $petugas;

    public function __construct(){
        $this->petugas = Petugas::when(request()->filled('q'), function($query){
            $search = request('q');
            $query->where('nama', 'like', "%{$search}%");
        })
        ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render(){
        return view('components.grid-petugas', [
            'petugas'   => $this->petugas
        ]);
    }
}
