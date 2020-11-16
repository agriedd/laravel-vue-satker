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
    protected $with = ['bidang'];

    public function bidang(){
        return $this->belongsTo(Bidang::class, 'id_bidang', 'id_bidang');
    }
}
