<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Jemaat;
use App\Jadwal_Detail;

class HomeController extends Controller
{

    public function home(){

    	$jemaat = Jemaat::all();
    	$kehadiran = new Jemaat;
    	$totaljadwal =  Jadwal::whereYear('tanggal_ibadah','=',date("Y"))->count();

    	return view('home',compact('jemaat'))
    	->with(compact('kehadiran'))
    	->with(compact('totaljadwal'))
      ->with( [
      'nav_class' => 'bg-primary'
        ,'nav2_class'=> '']);
    }

    public function create(Request $request){
      date_default_timezone_set("Asia/Jakarta");
    $jemaat = new Jemaat;
    $checkjemaat = $jemaat::where('nama_jemaat','=',$request->nama_jemaat)->get();
    $array = array();
	foreach ($checkjemaat as $value) {
		array_push($array,$value->jemaat_id);
	}

    if($array != null){
    	return redirect()->back()->with('alert', 'Nama Ini Telah Terdaftar');
    }

   	$jemaat->nama_jemaat = $request->nama_jemaat;
   	$jemaat->tempat_lahir = $request->tempat_lahir;
   	$jemaat->tanggal_lahir= $request->tanggal_lahir;
   	$jemaat->nomor_hp= $request->no_hp;
   	$jemaat->kelas = $request->kelas;
   	$jemaat->sekolah= $request->nama_sekolah;
   	$jemaat->jenis_kelamin = $request->jenis_kelamin;
   	$jemaat->alamat = $request->alamat;
    $jemaat->nama_orang_tua = $request->nama_orang_tua;
    $jemaat->nomor_hp_orang_tua = $request->no_hp_orang_tua;


   	if($request->hasfile('file_foto')){
   		$request->file('file_foto')->move(base_path('public/fotojemaat/'),$request->file('file_foto')->getClientOriginalName());
   		$jemaat->foto = $request->file('file_foto')->getClientOriginalName();
   	}


	$jemaat->save();

	$request->flush();

	return redirect('home')->with('success', 'Pendaftaran Berhasil');

    }

    public function kehadiran($id){
    	date_default_timezone_set("Asia/Jakarta");
    	$jadwal =  Jadwal::whereDate('tanggal_ibadah','=',date("Y-m-d"))->get();
    	$jadwal_kehadiran = new Jadwal_Detail;
    	$jadwal_kehadiran->jemaat_id = $id;
    	foreach ($jadwal as $data_jadwal) {
    		$jadwal_kehadiran->jadwal_id = $data_jadwal->jadwal_id ;
    	}
    	$jadwal_kehadiran->waktu_kedatangan = date("H:i");
    	$jadwal_kehadiran->tahun= date("Y");
    	$jadwal_kehadiran->save();
    	return redirect('home');
    }
}
