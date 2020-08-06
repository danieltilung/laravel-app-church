<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal_Detail extends Model
{
     protected $table = 'jadwal_detail';
    protected $fillable = [
        'jemaat_id','jadwal_id','waktu_kedatangan','tahun'
    ];
   public $timestamps = false;
}
