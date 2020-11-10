<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateBidang extends FormRequest
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
            'nama_bidang'       => 'required',
            'nama_kepala_b'     => 'required',
            'id_satker'         => 'required|exists:satker_1,id_satker',
            'visi_misi'         => 'required',
            'tujuan'            => 'required',
        ];
    }
}
