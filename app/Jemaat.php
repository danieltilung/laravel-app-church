<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{  
    protected $table = 'jemaat';
    protected $primaryKey = 'jemaat_id';
    protected $fillable = [
        'nama_jemaat', 'tempat_lahir', 'tanggal_lahir','no_hp','foto','jenis_kelamin','sekolah','kelas','alamat'
    ];
     public function ImageCheck($gender){
   		if(!$this->foto ){
   			if($gender == 'Pria'){
   			return asset('/fotojemaat/default-pria.png');
   			}
   			else{
   			return asset('/fotojemaat/default-wanita.png');	
   			}
   		}
   		return asset('/fotojemaat/'.$this->foto);
   }

     public function jadwal()
    {
        return $this->belongsToMany('App\Jadwal','jadwal_detail', 'jemaat_id', 'jadwal_id');
    }

}
