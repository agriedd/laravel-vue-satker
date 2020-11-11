<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pimpinan extends Authenticatable{

    use Notifiable;

    protected $table = 'pimpinan';
    protected $primaryKey = 'id_pimpinan';
    protected $guarded = [];
    protected $with = ['satker'];

    public function satker(){
        return $this->belongsTo(Satker::class, 'id_satker', 'id_satker');
    }
}
