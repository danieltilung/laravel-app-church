<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal_ibadah';
    protected $primaryKey = 'jadwal_id';
    protected $fillable = [
        'tanggal_ibadah'
    ];

     public function jemaat()
    {
        return $this->belongsToMany('App\Jemaat','jadwal_detail', 'jadwal_id', 'jemaat_id');
    }

}
