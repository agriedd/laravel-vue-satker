<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdatePetugas extends FormRequest{

    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = request()->route('petuga')->id_petugas;
        return [
            'nama'      => 'required',
            'id_bidang' => 'required|exists:bidang,id_bidang',
            'nip'       => "required|unique:petugas,nip,{$id},id_petugas",
            'pangkat'   => 'required',
            'status'    => 'required|in:PNS,Kontrak',
            'alamat'    => 'nullable',
        ];
    }
}
