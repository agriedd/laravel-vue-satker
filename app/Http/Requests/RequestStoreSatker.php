<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreSatker extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nama'      => 'required',
            'iso'       => 'required',
            'alamat'    => 'required',
            'status'    => 'required',
            'lain_lain' => 'nullable',
        ];
    }
}
