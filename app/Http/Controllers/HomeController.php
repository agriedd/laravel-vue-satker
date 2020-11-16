<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\StrukturOrganisasi;

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
    public function galeri(){
        return view('pages.home.galeri');
    }
    public function struktur(){
        $struktur = StrukturOrganisasi::latest()->first();
        return view('pages.home.struktur', [
            "struktur" => $struktur
        ]);
    }
    public function visimisi(){
        return view('pages.home.visi-misi');
    }
}
