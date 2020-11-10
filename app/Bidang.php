<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model{
    protected $table = 'bidang';
    protected $primaryKey = 'id_bidang';
    protected $guarded = [];
    protected $with = ['satker'];

    public function satker(){
        return $this->belongsTo(Satker::class, 'id_satker', 'id_satker');
    }
}
