<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreAdmin extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nama'  => 'required',
            'email' => 'required|unique:admin,email',
            'password'  => 'required|min:6',
        ];
    }
}
