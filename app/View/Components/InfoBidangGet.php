<?php

namespace App\View\Components;

use App\Bidang;
use Illuminate\View\Component;

class InfoBidangGet extends Component
{
    private $bidang;

    public function __construct(){
        if(request()->filled('id_bidang'))
            $this->bidang = Bidang::find(request('id_bidang'));
    }

    public function render(){
        return view('components.info-bidang-get', [
            'bidang' => $this->bidang
        ]);
    }
}
