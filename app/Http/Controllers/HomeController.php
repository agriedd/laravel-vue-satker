<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{
    public function __construct(){
        
    }
    public function index(){
        return view('pages.home.index');
    }
    public function petugas(){
        return view('pages.home.petugas');
    }
    public function kegiatan(){
        return view('pages.home.kegiatan');
    }
    public function bidang(){
        return view('pages.home.bidang');
    }
}
