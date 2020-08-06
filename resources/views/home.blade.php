@extends('MasterLayout.masterlayout')
@section('title')
<link rel="icon" href="\logo\favicon.ico">
<title>Beacon Teens | Home</title>

@endsection
@section('row')
  @foreach($jemaat as $data_jemaat)
   <form role="form" action="kehadiran/{{$data_jemaat->jemaat_id}}" method="POST" enctype="multipart/form-data" id="form-kehadiran-{{$data_jemaat->jemaat_id}}" hidden>
    {{csrf_field()}}
    </form>
    @endforeach
 <div class="row">
 	<div class="col-md-12">
 		<div class="card">
            <div class="card-header">
            	<div class="row">
            	<div class="col-md-8">
              <h3 class="card-title" style="font-weight: bold; font-size: 22px;">Data Jemaat GKRI Beacon Teens</h3>
              </div>
              <div class="col-md-4 text-right">
              <a  href="#" data-toggle="modal" data-target="#modal-create" style="font-size: 22px;font-weight: bold">
              <i class="fas fa-user-plus"></i>
                Tambah Jemaat Baru
             </a>
             </div>
             </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                  <th>Nama Jemaat</th>
                  <th>Umur</th>
                  <th>Kelas</th>
                  <th>Kehadiran</th>
                  <th>Tidak Hadir</th>
                  <th>Total Jadwal</th>
                  <th>Absen</th>
                </tr>
                </thead>
                <tbody>
          @foreach($jemaat as $data_jemaat)
          <?php 
          //Umur
          //tanggal lahir
				  $birthDt = new DateTime($data_jemaat->tanggal_lahir);
				  //tanggal hari ini
				  $today = new DateTime('today');
				  //umur
				  $Umur = $today->diff($birthDt)->y;

				  //Kehadiran
				if($kehadiran::find($data_jemaat->jemaat_id)->jadwal()->whereYear('tahun','=',date("Y"))->get() != null){
				  $data_kehadiran = $kehadiran::find($data_jemaat->jemaat_id)->jadwal()->whereYear('tahun','=',date("Y"))->get();
				  $hasil_kehadiran = $data_kehadiran->count();
					}
				  else{
				  	$hasil_kehadiran = 0;
					}
				 //Tidak Hadir
				 $hasil_tidak_hadir = $totaljadwal - $hasil_kehadiran;

                ?>
                <tr>
                
                  <td class="text-center"><a href="profile/{{$data_jemaat->jemaat_id}}">{{$data_jemaat->nama_jemaat}}</a></td>
                  <td class="text-center">{{$Umur}}</td>
                  <td class="text-center">{{$data_jemaat->kelas}}</td>
                  <td class="text-center">{{$hasil_kehadiran}}</td>
                  <td class="text-center">{{$hasil_tidak_hadir}}</td>
                  <td class="text-center">{{$totaljadwal}}</td>

                 
                @if((date("l") == "Sunday") && $kehadiran::find($data_jemaat->jemaat_id)->jadwal()->whereDate('tanggal_ibadah','=',date("Y-m-d"))->get()->count() == 0)
                 <td class="text-center"> 
                    <input class="form-check-input" type="checkbox" id="{{$data_jemaat->jemaat_id}}-checkbox"> 
                    <label class="form-check-label" for="{{$data_jemaat->jemaat_id}}-checkbox">Check Hadir</label>
                  </td>
                  @elseif((date("l") == "Sunday") && $kehadiran::find($data_jemaat->jemaat_id)->jadwal()->whereDate('tanggal_ibadah','=',date("Y-m-d"))->get()->count() != 0)
                   <td class="text-center"> 
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled checked> 
                    <label class="form-check-label" for="defaultCheck2">Check Hadir</label>
                     </td>
                  @else
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck3" disabled> 
                    <label class="form-check-label" for="defaultCheck3">Check Hadir</label>
                  </td>
                  @endif
                </tr>
                @endforeach

                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
 	</div>
 </div>
    @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @elseif(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif(session('success-delete'))
    <div class="alert alert-success">
        {{ session('success-delete') }}
    </div>
  @endif
@endsection
@section('modal')
<form role="form" action="/jemaat/create" method="POST" enctype="multipart/form-data" autocomplete="off">
{{csrf_field()}}
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static"  >
  <div class="modal-dialog modal-dialog-centered" role="document" >
    <div class="modal-content overflow-hidden" style="width: 470px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Lee Institute</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
    		  	<!-- Title -->
    		  	<div class="row">
    		  	<div class="col-md-4 mb-4">
                
                </div>
      			<div class="col-md-4 mb-4 text-center p-2 ">
                  <p style="font-weight: bold; background-color: blue; color: white; border-radius: 10px">Jadwal Kursus</p>
                </div>
                <div class="col-md-4 mb-4">
                 
                </div>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users-class"></i></span>
                  </div>
                  <select name="jenis_kelamin" class="custom-select col-md-4" required>
                  	<option value="">Kode Materi</option>
                  	<option value="Pria">Pria</option>
                  	<option value="Wanita">Wanita</option>
                  </select>
                </div>
      			<!-- Nama Jemaat Input -->
        		<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                  </div>
                  <input name="nama_jemaat" type="text" class="form-control col-md-5" placeholder="Judul Materi" required disabled="">
                </div>

                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-school"></i></span>
                  </div>
                  <select name="jenis_kelamin" class="custom-select col-md-4" required>
                  	<option value="">Ruang</option>
                  	<option value="Pria">Pria</option>
                  	<option value="Wanita">Wanita</option>
                  </select>
                </div>

                <!-- Tempat,Tanggal Lahir Input -->
                  <div class="input-group mb-3">
                  	<div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                 <select name="jenis_kelamin" class="custom-select col-md-2" required>
                  	<option value="">DD</option>
                  	
                  </select>
                  <div class="input-group-prepend ml-2 ">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <select name="jenis_kelamin" class="custom-select col-md-2" required>
                  	<option value="">MM</option>
                  
                  </select>
                  <div class="input-group-prepend ml-2">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <select name="jenis_kelamin" class="custom-select col-md-4" required>
                  	<option value="">YYYY</option>
                  
                  </select>
                </div>
               <!--  Jenis Kelamin input -->
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                  </div>
                  <select name="jenis_kelamin" class="custom-select col-md-4" required>
                  	<option value="">Kode Pengajar</option>
                  	<option value="Pria">Pria</option>
                  	<option value="Wanita">Wanita</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fal fa-chalkboard-teacher"></i></span>
                  </div>
                  <input name="nama_jemaat" type="text" class="form-control col-md-5" placeholder="Nama Pengajar" required disabled="">
                </div>
              
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
@section('Script')
<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
       "lengthMenu": [[5,10,20, -1], [5,10,20, "All"]],
   "columnDefs": [
    { "orderable": false, "targets": [] }
  ],
   "language": {
            "lengthMenu": "Show Entries _MENU_",
        }
    });
  });
</script>
 <script>
$('#inputGroupFile01').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})
</script>
<script type="text/javascript">
var data_jemaat= <?php echo json_encode($jemaat); ?>;

for (var i = 0; i < data_jemaat.length; i++) {
   var datatemp = data_jemaat[i];
    validationCheckBox(String(datatemp["jemaat_id"])+"-checkbox","form-kehadiran-"+String(datatemp["jemaat_id"]));

 }
function validationCheckBox(checkbox_id,form_id){
  var checkbox = document.getElementById(checkbox_id); 
  if(checkbox != null){
  checkbox.addEventListener('change', function() {
    if(checkbox.checked) {
            swal("Apakah anda yakin dengan aksi ini ? (aksi ini tidak dapat diulang) ", {
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
        document.getElementById(form_id).submit();
                break;
           case "No":
        checkbox.checked = false;
                break;    
            }
          });
    }
});
  }
}

</script>


@endsection