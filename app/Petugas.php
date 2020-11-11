<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $guarded = [];
    protected $with = ['bidang'];

    public function bidang(){
        return $this->belongsTo(Bidang::class, 'id_bidang', 'id_bidang');
    }
}
