<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateAdmin extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $id = request()->route('admin')->id;
        return [
            'nama'  => 'required',
            'email' => "required|unique:admin,email,${id}",
            'password'  => 'required|min:6',
        ];
    }
}
