<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateSatker extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nama'      => 'required',
            'iso'       => 'required',
            'alamat'    => 'required',
            'status'    => 'required|in:BUMN,DINAS PEMERINTAH',
            'lain_lain' => 'nullable',
        ];
    }
}
