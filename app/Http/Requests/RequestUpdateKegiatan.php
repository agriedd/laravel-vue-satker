<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateKegiatan extends FormRequest
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
            'nama_kegiatan' => 'required',
            'tanggal'       => 'required|date',
            'id_bidang'       => 'required|exists:bidang,id_bidang',
            'rincian_kegiatan'       => 'required',
            'lokasi'       => 'required',
        ];
    }
}
