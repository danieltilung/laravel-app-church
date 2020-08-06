@extends('MasterLayout.masterlayout')
@section('title')
<link rel="icon" href="\logo\profile.ico">
<title>{{$jemaat->nama_jemaat}} | Profile</title>
@endsection
@section('row')
 <form action="/profile/{{$jemaat->jemaat_id}}/delete" method="POST" enctype="multipart/form-data"  id="form-delete1" >
  {{csrf_field()}}
</form>		
 <div class="row">
 	<div class="col-md-4">

 		      <div class="card card-primary">
 		      	<div class="card-header">
                <h3 class="card-title" style="font-weight: bold;">Profile Jemaat</h3>
              </div>
              <div class="card-body box-profile">
                <div class="text-center mb-3">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{$jemaat->ImageCheck($jemaat->jenis_kelamin)}}"
                       alt="User profile picture">
                </div>
         
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item" style="border-top: none;">
                     <b>Nama Lengkap</b> <a class="float-right">{{$jemaat->nama_jemaat}}</a>
                  </li>
                  <li class="list-group-item">
                     <b>Jenis Kelamin</b> <a class="float-right">{{$jemaat->jenis_kelamin}}</a>
                  </li>
                  <li class="list-group-item">
                  	  <b>Tempat/Tanggal Lahir</b><a class="float-right">{{$jemaat->tempat_lahir . date_format(date_create($jemaat->tanggal_lahir),", d-m-Y")}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mulai Gabung Pada</b> <a class="float-right">{{date_format(date_create($jemaat->created_at),"d-m-Y")}}</a>
                  </li>
                </ul>

                <a data-toggle="collapse" href="#Information" class="btn btn-primary btn-block mb-3 "><b>Informasi Detail</b></a>

               <div class="collapse show" id="Information">

                 <strong><i class="fas fa-book mr-1"></i> Pendidikan</strong>
                <p class="text-muted">{{ $jemaat->kelas}}</p>

                <hr>
                <strong><i class="fas fa-school mr-1"></i> Sekolah</strong>
                <p class="text-muted">{{ $jemaat->sekolah}}</p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted">{{$jemaat->alamat}}</p>

                <hr>

                <strong><i class="fas fa-phone-alt mr-1"></i> Nomor Telepon</strong>

                <p class="text-muted">{{$jemaat->nomor_hp}}</p>

                <hr>

                <strong><i class="fas fa-user-friends mr-1"></i> Nama Orangtua</strong>

                <p class="text-muted">{{$jemaat->nama_orang_tua}}</p>

                 <hr>

                <strong><i class="fas fa-phone-square-alt mr-1"></i>Nomor Telepon Orangtua</strong>

                <p class="text-muted">{{$jemaat->nomor_hp_orang_tua}}</p>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>

 		</div>
 		<div class="col-md-8">
 			<div class="card">
 			<div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#kehadiran" data-toggle="tab">Daftar Kehadiran</a></li>
                  <li class="nav-item"><a class="nav-link" href="#update-profile" data-toggle="tab">Update Profile</a></li>
                  
                </ul>
              </div>
              	<div class="card-body">
 				 <div class="tab-content">
 				  <div class="active tab-pane" id="kehadiran">
 				  	<div class="row">
				<div class="col-md-4"></div>
      			<div class="col-md-4 mb-4 text-center">
                  <h5  class="bg-primary" style="font-weight: bold; padding: 10px; border-radius: 20px">Daftar Kehadiran Tahun {{date("Y")}}</h5>
                </div>
                <div class="col-md-4"></div>
                </div>
	 				<table id="example1" class="table table-bordered table-striped">
	                <thead class="text-center">
	                <tr>
	                  <th>Tanggal Ibadah</th>
	                  <th>Waktu Kedatangan</th>
	                  <th>Tema Ibadah</th>
	                  <th>Pembicara</th>
	                </tr>
	                </thead>
	                <tbody class="text-center">
	              

	              @foreach($jadwal as $data_jadwal) 
	              
	                @if(in_array($data_jadwal->jadwal_id,$array) )
	                <?php $data_jadwal_detail = $jadwal_detail::where('jadwal_id','=',$data_jadwal->jadwal_id)->get();?>
	                @foreach($data_jadwal_detail as $data_kehadiran)
	                <tr class="bg-success">
	                  <td>{{date_format(date_create($data_jadwal->tanggal_ibadah),"d-m-Y")}}</td>
	                  <td>{{$data_kehadiran->waktu_kedatangan}}</td>
	                  <td>{{$data_jadwal->tema_ibadah}}</td>
	                  <td>{{$data_jadwal->pembicara}}</td>
	                </tr>
	                @endforeach
	                @else
	                  <tr class="bg-danger">
	                  <td>{{date_format(date_create($data_jadwal->tanggal_ibadah),"d-m-Y")}}</td>
	                  <td>-</td>
	                  <td>{{$data_jadwal->tema_ibadah}}</td>
	                  <td>{{$data_jadwal->pembicara}}</td>
	                </tr>
	                @endif
	            @endforeach
	                </tbody>
	                <tfoot>
	                </tfoot>
	              </table>
              		 
 				  </div>
				<div class="tab-pane" id="update-profile">
			<form role="form" action="/profile/{{$jemaat->jemaat_id}}/update" method="POST" enctype="multipart/form-data"  autocomplete="off">
            {{csrf_field()}}
				<!-- Title -->
				<div class="row">
				<div class="col-md-4"></div>
      			<div class="col-md-4 mb-4 text-center">
                  <h5  class="bg-primary" style="font-weight: bold; padding: 10px; border-radius: 20px">Form Update</h5>
                </div>
                <div class="col-md-4"></div>
                </div>
                <hr>
      			<!-- Nama Jemaat Input -->
        		<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input name="nama_jemaat" type="text" class="form-control col-md-3" placeholder="Nama Jemaat">
                </div>
                <!-- Tempat,Tanggal Lahir Input -->
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                  </div>
                  <input name="tempat_lahir" type="text" class="form-control col-md-4" placeholder="Tempat Lahir">
                  <div class="input-group-prepend ml-2">
                    <span class="input-group-text "><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input name="tanggal_lahir" type="text" class="form-control" onfocus="(this.type='date')"
        		onblur="(this.type='text')" placeholder="Tanggal Lahir">
                </div>
               <!--  Jenis Kelamin input -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                  </div>
                  <select name="jenis_kelamin" class="custom-select col-md-3">
                  	<option value="">Jenis Kelamin</option>
                  	<option value="Pria">Pria</option>
                  	<option value="Wanita">Wanita</option>
                  </select>
                </div>
               <!--No Hp Input -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input name="no_hp" type="tel" pattern="[0-9]{10,12}" class="form-control col-md-3" placeholder="No Handphone">
                </div>
                <!-- Sekolah,Kelas Input -->
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                  </div>
                  <select name="kelas" class="custom-select col-md-4" >
                  	<option value="">Kelas</option>
                  	<option disabled style="background-color:rgb(220,220,220);">SMP</option>
                  	<option value="Kelas 7 (SMP)">VII (Kelas 7)</option>
                  	<option value="Kelas 8 (SMP)">VIII (Kelas 8)</option>
                  	<option value="Kelas 9 (SMP)">IX (Kelas 9)</option>
                  	<option disabled style="background-color:rgb(220,220,220);">SMA</option>
                  	<option value="Kelas 10 (SMA)">X (Kelas 10)</option>
                  	<option value="Kelas 11 (SMA)">XI (Kelas 11)</option>
                  	<option value="Kelas 12 (SMA)">XII (Kelas 12)</option>
		          	<option disabled style="background-color:rgb(220,220,220);" >Lain-Lain</option>
                  	<option value="Kuliah">Kuliah</option>
                  	<option value="lain-lain">Kerja</option>
                  </select>
                  <div class="input-group-prepend ml-2">
                    <span class="input-group-text"><i class="fas fa-school"></i></span>
                  </div>
                  <input name="nama_sekolah" type="text"class="form-control col-md-5" placeholder="Nama Sekolah">
                </div>
              <!--   Foto -->
              <div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-images"></i></span>
			  </div>
			  <div class="custom-file col-5">
			    <input name="file_foto" type="file" class="custom-file-input" id="inputGroupFile01"
			      aria-describedby="inputGroupFileAddon01" value="null">
			    <label class="custom-file-label" for="inputGroupFile01">Foto Jemaat</label>
			  </div>
			</div>

			<!-- Alamat Input -->
    		<div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-address-book"></i></span>
              </div>
              <textarea name="alamat" rows="2" cols="30" placeholder="  Alamat"></textarea>
            </div>
            <!-- Nama Orang Tua -->
	        <div class="input-group mb-3">
	              <div class="input-group-prepend">
	                <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
	              </div>
	              <input name="nama_orang_tua" type="text" class="form-control col-md-3" placeholder="Nama Orangtua">
	            </div>
	         <!--    No HP Orang Tua -->
	        <div class="input-group mb-3">
	            <div class="input-group-prepend">
	              <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
	            </div>
	            <input name="no_hp_orang_tua" type="tel" pattern="[0-9]{10,13}" class="form-control col-md-4" placeholder="No Handphone Orangtua">
	          </div>
		            <div class="modal-footer">	
		         	<button type="button" id="x" onclick="formsubmit()" class="btn btn-danger">Delete Profile</button>
		        	<button type="submit" class="btn btn-primary">Update Profile</button>
		        </form>
		      		</div>
					</div>
 				 </div>
 			</div>
 			</div>
 			
 			
  
    @if(session('has-update'))
    <div class="alert alert-success">
        {{ session('has-update') }}
    </div>
    @elseif(session('alert-update'))
    <div class="alert alert-danger">
        {{ session('alert-update') }}
    </div>
    @elseif(session('no-update'))
    <div class="alert alert-success">
        {{ session('no-update') }}
    </div>
    @endif
 		</div>
 	</div>
 @endsection
 @section('Script')
 <!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/plugins/sorting/date-uk.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
       "lengthMenu": [[5,10,20, -1], [5,10,20, "All"]],
   "columnDefs": [
    { "orderable": false, "targets": [] },{ "width": "40%", "targets": 2 },
    { type: 'date-uk', targets: 0 }
  ],
   "language": {
            "lengthMenu": "Show Entries _MENU_",
        }
    });
  });
</script>
<script >


		function formsubmit(){
		var form1 = document.getElementById('form-delete1');
		swal("Apakah anda yakin dengan aksi ini ? (Aksi ini tidak dapat diulang) ", {
            closeOnClickOutside: false,
             icon: "warning",
            buttons: {
              No: "No",
              Yes: "Yes",
            },
          })
          .then((value) => {
            switch (value) {
              case "Yes":
        form1.submit();
                break;
           case "No":
                break;    
            }
          });

		}

</script>
<script>
$('#inputGroupFile01').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})
</script>
@endsection