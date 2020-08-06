<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Jemaat;

class JadwalController extends Controller
{
  	public function jadwalibadah(){
  		$jadwal_ibadah = Jadwal::whereYear('tanggal_ibadah','=',date("Y"))->get();
  		$jadwal_ibadah_all= Jadwal::all();
  		$jemaat= Jemaat::all();


  		return view('jadwalibadah',[
        'nav_class' => '',
        'nav2_class' => 'bg-primary'
        ])
        ->with(compact('jadwal_ibadah'))
         ->with(compact('jadwal_ibadah_all'))
          ->with(compact('jemaat'));
  	}

  	public function create_jadwal(Request $request){
  		date_default_timezone_set("Asia/Jakarta");
  $jadwalibadah = new Jadwal;


    $checktema = $jadwalibadah::where('tema_ibadah','=',$request->tema_ibadah)->get();
     $array1 = array();
	foreach ($checktema as $value) {
		array_push($array1,$value->jadwal_id);
	}

    if($array1 != null){
    	return redirect()->back()->with('alert', 'Tema tersebut sudah ada !');
    } 

  		
  		$jadwalibadah->tanggal_ibadah = $request->tanggal_ibadah;
  		$jadwalibadah->minggu_ke = $request->mingguke;
  		$jadwalibadah->tema_ibadah = $request->tema_ibadah;
  		$jadwalibadah->pembicara = $request->pembicara;

  		$jadwalibadah->save();
  		
  		

  		return redirect('/jadwalibadah')->with('success', 'Penambahan Jadwal Berhasil');
  	}
}
