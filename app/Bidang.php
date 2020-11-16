<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model{
    protected $table = 'bidang';
    protected $primaryKey = 'id_bidang';
    protected $guarded = [];
    protected $with = ['satker', 'foto_kegiatan', 'pimpinan'];
    protected $appends = ['visi_misi_html'];

    public function satker(){
        return $this->belongsTo(Satker::class, 'id_satker', 'id_satker');
    }
    public function kegiatan(){
        return $this->hasMany(Kegiatan::class, 'id_bidang', 'id_bidang');
    }
    public function petugas(){
        return $this->hasMany(Petugas::class, 'id_bidang', 'id_bidang');
    }
    public function pimpinan(){
        return $this->hasOne(Pimpinan::class, 'id_bidang', 'id_bidang')->without(['bidang']);
    }
    public function foto_kegiatan(){
        return $this->hasOne(Kegiatan::class, 'id_bidang', 'id_bidang')->whereNotNull('gambar')->without(['bidang']);
    }

    public function getVisiMisiHtmlAttribute(){
        return nl2br($this->visi_misi);
    }
}
