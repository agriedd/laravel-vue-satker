<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStorePetugas extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nama'      => 'required',
            'id_bidang' => 'required|exists:bidang,id_bidang',
            'nip'       => 'required|unique:petugas,nip',
            'pangkat'   => 'required',
            'status'    => 'required|in:PNS,Kontrak',
            'alamat'    => 'nullable',
        ];
    }
}
