<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreStruktur extends FormRequest{

    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'gambar'    => 'required|file|image',
            'id_satker' => 'required|exists:satker_1,id_satker',
        ];
    }
}
