<?php

namespace App\View\Components;

use App\Bidang;
use Illuminate\View\Component;

class GridBidang extends Component{

    private $bidang;

    public function __construct(){
        $this->bidang = Bidang::when(request()->filled('q'), function($query){
            $search = request('q');
            $query->where('nama_bidang', 'like', "%{$search}%");
        })->get();
    }

    public function render(){
        return view('components.grid-bidang', [
            'bidang'    => $this->bidang,
        ]);
    }
}
