<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model{
    protected $table = 'pimpinan';
    protected $primaryKey = 'id_pimpinan';
    protected $guarded = [];
    protected $with = ['satker'];

    public function satker(){
        return $this->belongsTo(Satker::class, 'id_satker', 'id_satker');
    }
}
