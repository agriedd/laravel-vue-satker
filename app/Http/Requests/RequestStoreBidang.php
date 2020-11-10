<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreBidang extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nama_bidang'       => 'required',
            'nama_kepala_b'     => 'required',
            'id_satker'         => 'required|exists:satker_1,id_satker',
            'visi_misi'         => 'required',
            'tujuan'            => 'required',
        ];
    }
}
