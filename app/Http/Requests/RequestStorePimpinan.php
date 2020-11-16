<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStorePimpinan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_bidang'         => 'required|exists:bidang,id_bidang',
            'nama'              => 'required',
            'nip'               => 'required|unique:pimpinan,nip',
            'pangkat'           => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date',
            'alamat'            => 'required',
        ];
    }
}
