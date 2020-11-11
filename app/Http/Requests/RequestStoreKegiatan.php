<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreKegiatan extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nama_kegiatan' => 'required',
            'tanggal'       => 'required|date',
            'id_bidang'       => 'required|exists:bidang,id_bidang',
            'rincian_kegiatan'       => 'required',
            'lokasi'       => 'required',
        ];
    }
}
