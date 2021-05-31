<?php

namespace App\View\Components;

use App\Bidang;
use Illuminate\View\Component;

class TableBidang extends Component
{
    private $bidang;
    
    public function __construct()
    {
        $this->bidang = Bidang::when(request()->filled('q'), function($query){
            $search = request('q');
            $query->where('nama_bidang', 'like', "%{$search}%");
        })->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.table-bidang', [
            'bidang'    => $this->bidang,
        ]);
    }
}
