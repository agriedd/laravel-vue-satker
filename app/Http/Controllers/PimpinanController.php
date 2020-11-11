<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PimpinanController extends Controller{
    
    public function __construct(){
        $this->middleware('auth:pimpinan');
    }

    public function index(){
        return view('pages.pimpinan.index', [
            'user'  => Auth::guard('pimpinan')->user()
        ]);
    }
}
