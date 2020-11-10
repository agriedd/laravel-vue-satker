<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasi extends Model{
    protected $table = 'struktur_organisasi';
    protected $primaryKey = 'id_struktur';
    protected $guarded = [];
    protected $with = ['satker'];
    protected $appends = ['gambar_url'];

    public function satker(){
        return $this->belongsTo(Satker::class, 'id_satker', 'id_satker');
    }
    public function getGambarUrlAttribute(){
        if(Storage::disk('public')->exists($this->gambar)){
            return Storage::disk('public')->url($this->gambar);
        }
        return null;
    }
}
