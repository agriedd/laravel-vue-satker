<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        
        // Auth::guard()->logout();

        // request()->session()->invalidate();

        // request()->session()->regenerateToken();

        return view('pages.admin.index', [
            'user'  => Auth::guard()->user()
        ]);
    }
}
