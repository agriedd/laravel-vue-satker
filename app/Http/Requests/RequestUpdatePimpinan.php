<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdatePimpinan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        $id_pimpinan = request()->route('pimpinan')->id_pimpinan;
        return [
            'id_satker'         => 'required|exists:satker_1,id_satker',
            'nama'              => 'required',
            'nip'               => "required|unique:pimpinan,nip,{$id_pimpinan},id_pimpinan",
            'pangkat'           => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date',
            'alamat'            => 'required',
        ];
    }
}
