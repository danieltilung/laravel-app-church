<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jemaat;
use App\Jadwal;
use App\Jadwal_Detail;

class ProfileController extends Controller
{
    public function profile($id){
    	$jemaat = Jemaat::find($id);
    	$kehadiran = Jemaat::find($id)->jadwal()->get();
    	$jadwal = Jadwal::whereYear('tanggal_ibadah','=',date("Y"))->get();
    	$jadwal_detail= new Jadwal_Detail;

    	$array= array();
  		foreach ($kehadiran as $data_kehadiran) {
  			array_push($array,$data_kehadiran->jadwal_id);
  		}


    	return view('profile',compact('jemaat'))
    	->with(compact('array'))
    	->with(compact('jadwal'))
    	->with(compact('jadwal_detail'))
        ->with([
        'nav_class' => 'bg-primary',
        'nav2_class' => ''
        ]);
    }

    public function delete($id){
    	$jadwal_detail= Jadwal_Detail::where('jemaat_id','=',$id);
    	if($jadwal_detail->count() != 0){
    		$jadwal_detail->forceDelete();
    	}
    	$jemaat = Jemaat::find($id);
    	$jemaat->forceDelete();

    	return redirect('home')->with('success-delete', 'Sukses Menghapus Data Jemaat');
    }

    public function update($id,Request $request){


    $jemaat = Jemaat::find($id);
    if($request->hasfile('file_foto')){
		$request->file('file_foto')->move(base_path('public/fotojemaat/'),$request->file('file_foto')->getClientOriginalName());
		$jemaat->foto = $request->file('file_foto')->getClientOriginalName();
		  		if($request->nama_jemaat != null){
		    $jemaat->nama_jemaat = $request->nama_jemaat;
			}
			if($request->tempat_lahir!= null){
		   	$jemaat->tempat_lahir = $request->tempat_lahir;
		   	}
		   	if($request->tanggal_lahir!= null){
		   	$jemaat->tanggal_lahir= $request->tanggal_lahir;
		   	}
		   	if($request->no_hp!= null){
		   	$jemaat->nomor_hp= $request->no_hp;
		    }
		    if($request->kelas!= null){
		   	$jemaat->kelas = $request->kelas;
		    }
		    if($request->nama_sekolah!= null){
		   	$jemaat->sekolah= $request->nama_sekolah;
		    }
		    if($request->jenis_kelamin!= null){
		   	$jemaat->jenis_kelamin = $request->jenis_kelamin;
		    }
		    if($request->alamat!= null){
		   	$jemaat->alamat = $request->alamat;
		    }
		    if($request->no_hp_orang_tua!= null){
		   	$jemaat->nomor_hp_orang_tua = $request->no_hp_orang_tua;
		    }
		    if($request->nama_orang_tua!= null){
		   	$jemaat->nama_orang_tua = $request->nama_orang_tua;
		    }


		   	$jemaat->save();

			$request->session()->flush();
		    return redirect()->back()->with('has-update', 'Data Sudah Terupdate');
		   	}
    
	$totalcount = 0;

    foreach ($request->except('_token') as $value) {
    	if($value == null){
    			$totalcount = $totalcount+1;
    	}
    }
    if($totalcount == 10){
       	return redirect()->back()->with('no-update', 'Tak ada yang berubah');
    }

  	 $checkjemaat = Jemaat::where('nama_jemaat','=',$request->nama_jemaat)->get();
    $array = array();
	foreach ($checkjemaat as $value) {
		array_push($array,$value->jemaat_id);
	}

    if($array != null){
    		$request->session()->flush();
    	return redirect()->back()->with('alert-update', 'Nama Ini Telah Terdaftar. Gunakan Nama lain');
    }

    
    if($request->nama_jemaat != null){
    $jemaat->nama_jemaat = $request->nama_jemaat;
	}
	if($request->tempat_lahir!= null){
   	$jemaat->tempat_lahir = $request->tempat_lahir;
   	}
   	if($request->tanggal_lahir!= null){
   	$jemaat->tanggal_lahir= $request->tanggal_lahir;
   	}
   	if($request->no_hp!= null){
   	$jemaat->nomor_hp= $request->no_hp;
    }
    if($request->kelas!= null){
   	$jemaat->kelas = $request->kelas;
    }
    if($request->nama_sekolah!= null){
   	$jemaat->sekolah= $request->nama_sekolah;
    }
    if($request->jenis_kelamin!= null){
   	$jemaat->jenis_kelamin = $request->jenis_kelamin;
    }
    if($request->alamat!= null){
   	$jemaat->alamat = $request->alamat;
    }
    if($request->no_hp_orang_tua!= null){
   	$jemaat->nomor_hp_orang_tua = $request->no_hp_orang_tua;
    }
    if($request->nama_orang_tua!= null){
   	$jemaat->nama_orang_tua = $request->nama_orang_tua;
    }


   	$jemaat->save();

	$request->session()->flush();
    return redirect()->back()->with('has-update', 'Data Sudah Terupdate');
    }
}
