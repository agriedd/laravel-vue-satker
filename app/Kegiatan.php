<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model{
    
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $guarded = [];
    protected $with = ['bidang'];
    protected $casts = ['tanggal' => 'date:Y-m-d'];
    protected $appends = ['aktif'];

    public function bidang(){
        return $this->belongsTo(Bidang::class, 'id_bidang', 'id_bidang');
    }
    public function getAktifAttribute(){
        return $this->tanggal->gte(now());
    }
}
