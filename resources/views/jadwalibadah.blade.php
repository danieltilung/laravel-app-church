@extends('MasterLayout.masterlayout')
@section('title')
<title>Beacon Teens | Jadwal Ibadah</title>
 <!-- Select2 -->
  <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  @endsection
@section('row')
<div class="row">
	<div class="col-md-4">
		 <div class="card card-primary ">
              <div class="card-header ">
                <h3 class="card-title" style="font-weight: bold;">Buat Jadwal Pelayanan</h3>
                 <div class="card-tools">
                  <button type="button"
                          class="btn btn-primary btn-sm"
                          data-toggle="collapse" 
                          data-target="#Create"
                          title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
              	</div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="collapse show" id="Create">
              <form role="form" action="/jadwalibadah/create" method="POST" enctype="multipart/form-data"  autocomplete="off">
              	{{csrf_field()}}
                <div class="card-body overflow-auto" style="max-height: 240px">
                  <!-- Tanggal Pelayanan -->
                
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-microphone-stand"></i></span>
                  </div>
                  <select class="custom-select select2-special" required>
                    <option value="">Pilih Tanggal Pelayanan </option>
                    @foreach($jadwal_ibadah as $data_jadwal_ibadah)
                    <option value="{{$data_jadwal_ibadah->jadwal_id}}">{{date_format(date_create($data_jadwal_ibadah->tanggal_ibadah),"d-m-Y")}}</option>
                   @endforeach
                  </select>
                </div>
                   <!-- Penanggung Jawab -->
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fad fa-users"></i></span>
                  </div>
                  <select class="custom-select select2" required>
                    <option value="">Masukan Nama Ketua Pelayanan</option>
                    @foreach($jemaat as $jemaat_data)
                    <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                   @endforeach
                  </select>
                </div>
                 
                 <!--  WL -->
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-microphone-stand"></i></span>
                  </div>
                  <select class="custom-select select2" required>
                    <option value="">Masukan Nama Worship Leader (WL)</option>
                    @foreach($jemaat as $jemaat_data)
                    <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                   @endforeach
                  </select>
                </div>
                <!-- Singer 1 -->
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fad fa-microphone-stand"></i></span>
                  </div>
                  <select class="custom-select select2" required>
                    <option value="" >Masukan Nama Singer 1</option>
                    @foreach($jemaat as $jemaat_data)
                    <option value="{{$jemaat_data->jemaat_id}}">{{$jemaat_data->nama_jemaat}}</option>
                   @endforeach
                  </select>
                </div>
                 
                  <!-- Singer 2 -->
                  <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fad fa-microphone-stand"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="">Masukan Nama Singer 2</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>
                   <!-- Keyboard -->
                 <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fad fa-piano-keyboard"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="" >Masukan Nama Pemain Keyboard</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>
                  
                 <!--  Drummer -->
                 <div class="input-group mb-3">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-drum"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="" >Masukan Nama Pemain Drum</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>
                   <!-- Gitar -->
                 <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-guitar"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="" >Masukan Nama Pemain Gitar</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>
                   <!-- Bass -->
                 <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-guitar-electric"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="">Masukan Nama Pemain Bass</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>
                   <!-- Mixer -->
                 <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fad fa-amp-guitar"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="">Masukan Nama Petugas Mixer</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>

                 <!--  Penerima Tamu -->
                    <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-handshake"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="">Masukan Nama Usher 1</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>

                  <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-handshake"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="">Masukan Nama Usher 2</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>

                 <!--  Persembahan -->
                   <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hands-heart"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="">Masukan Nama Petugas Persembahan 1</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>

                  <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hands-heart"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="">Masukan Nama Petugas Persembahan 2</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>
                   <!--  Perlengkapan -->
                  <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="">Masukan Nama Petugas Perlengkapan 1</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>
                  <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="">Masukan Nama Petugas Perlengkapan 2</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>
                  <div class="input-group mb-3 ">
                     <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                  </div>
                      <select class="custom-select select2" required>
                      <option value="">Masukan Nama Petugas Perlengkapan 3</option>
                      @foreach($jemaat as $jemaat_data)
                      <option value="{{$jemaat_data->nama_jemaat}}">{{$jemaat_data->nama_jemaat}}</option>
                      @endforeach
                  </select>
                  </div>

                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                 </div>
              </form>
            </div>

		</div>

	<div class="col-md-8">
		<div class="card">
		<div class="card-header p-2">
            <ul class="nav nav-pills">
               <li class="nav-item"><a class="nav-link active " href="#jadwalibadah" data-toggle="tab" >Jadwal Ibadah {{date("Y")}}</a></li>
            </ul>
          </div>
          <div class="card-body">
          	<div class="tab-content">
          		<div class="tab-pane active" id="jadwalibadah"> 
          		  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>Tanggal Ibadah</th>
                  <th>Minggu Ke-</th>
                  <th>Tema Ibadah</th>
                  <th>Pembicara</th>
                </tr>
                </thead>
                <tbody class="text-center">
                	@foreach($jadwal_ibadah as $data_jadwal_ibadah)
                <tr class="text-center">
             
                  <td>{{date_format(date_create($data_jadwal_ibadah->tanggal_ibadah),"d-m-Y")}} </td>
                  <td>{{$data_jadwal_ibadah->minggu_ke}}</td>
                  <td>{{$data_jadwal_ibadah->tema_ibadah}}</td>
                  <td>{{$data_jadwal_ibadah->pembicara}} </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
          		</div>
          		
          	</div>
          </div>
		</div>
		<div class="card card-primary">
		<div class="card-header ">  
			<h3 class="card-title">Calendar</h3>
               <div class="card-tools">
                  <button type="button"
                          class="btn btn-primary btn-sm"
                          data-toggle="collapse" 
                          data-target="#calendar1"
                          title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
              	</div>
          </div>
           <div class="collapse show" id="calendar1">
          <div class="card-body">
      		<div id="calendar"></div>
	          @if(session('success'))
			<div class="alert alert-success">
			    {{ session('success') }}
			</div>
			@elseif(session('alert'))
			<div class="alert alert-danger">
			    {{ session('alert') }}
			</div>
			@endif
          </div>
      </div>
		</div>
		</div>
	</div>

<!-- Modal -->
@foreach($jadwal_ibadah_all as $jadwal_ibadah_all_data)
<div class="modal fade" id="{{$jadwal_ibadah_all_data->jadwal_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop ="static">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endforeach
<div class="modal fade" id="create_jadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop ="static">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form role="form" action="/jadwalibadah/create" method="POST" enctype="multipart/form-data"  autocomplete="off">
              	{{csrf_field()}}
                <!-- Tanggal Ibadah -->
                  <div class="form-group col-md-8 ">
                    <label for="tanggal_ibadah">Tanggal Ibadah</label>
                     <input name="tanggal_ibadah" type="date" class="form-control"required id="tanggal_ibadah" placeholder="Masukan Tanggal Ibadah" readonly="true">
                  </div>
                  <!-- Minggu ke- -->
                  <div class="form-group col-md-12 ">
                    <label for="mingguke">Minggu Ke-</label>
                     <input type="text" class="form-control tooltip-test" id="mingguke"  name="mingguke" required placeholder="(Format : Bulan-Minggu ke- | Contoh : 'Jan-1')" pattern="([A-z]{3})-([1-5]{1})">
                  </div>

                  <!-- Tema -->
                  <div class="form-group col-md-12">
                    <label for="tema_ibadah">Tema Ibadah</label>
                    <input type="text" class="form-control" id="tema_ibadah"  name="tema_ibadah" required placeholder="Masukan Tema Ibadah">
                  </div>
                  <!-- Pembicara -->
                  <div class="form-group col-md-8">
                    <label for="pembicara">Pembicara</label>
                    <input type="text" class="form-control" id="pembicara"  name="pembicara" required placeholder="Masukan Nama Pembicara">
                  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
         </form> 
      </div>
    </div>
  </div>
</div>


@endsection
@section('Script')
<script src="/plugins/datatables/jquery.dataTables.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/plugins/sorting/date-uk.js"></script>

<!-- fullCalendar 2.2.5 -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/fullcalendar/main.min.js"></script>
<script src="/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="/plugins/fullcalendar-bootstrap/main.min.js"></script>
<!-- jQuery UI -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.8.16/dayjs.min.js" crossorigin="anonymous"></script>


<!-- Select2 -->
<script src="/plugins/select2/js/select2.full.min.js"></script>


<!-- Page script -->
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

	   /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
  

    var calendarEl = document.getElementById('calendar');
    var jadwalibadahall= <?php echo json_encode($jadwal_ibadah_all); ?>;

    var arraytemp =[];
    for (var i = 0; i < jadwalibadahall.length; i++) {
    	datatemp = jadwalibadahall[i];
    	var date = new Date(datatemp["tanggal_ibadah"]);
    	var d = date.getDate(),
    	    m = date.getMonth();
    	    y = date.getFullYear();
        arraytemp[i] = {
          title          : '  Ibadah Minggu',
            description: 'Minggu Ke- : '+String(datatemp["minggu_ke"])+'<br>Tema : '+String(datatemp["tema_ibadah"])+'<br>Pembicara : '+String(datatemp["pembicara"])+'<br>Jam : 10:00 - 11:30',
          start          : new Date(y,m,d ,10,0),
           end          : new Date(y,m,d ,11,30),
           allDay         : false,
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954',//red
          id : String(datatemp["jadwal_id"])
        };
     

       }

    var calendar = new Calendar(calendarEl, {

       eventClick: function(info) {

 		$("#"+info.event.id).modal();
 	

  		},
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      //Random default events
      events    : arraytemp,
      eventRender: function (info) {
      	
      $(info.el).tooltip({ 
      title: info.event.extendedProps.description,
      placement: 'top',
      trigger: 'hover',
      container: 'body',
      html: true,
      });     
      },
      displayEventTime : false,
	selectable : true,
	select : function(info){
		var x =calendar.getEvents();
		var count = info.start.getDay();
		var temp = [];
		console.log(info.start.getDate());
		var date = info.start;
        const formatedDate = dayjs(date).format("DD-MM-YYYY");

	for(var i =0;i < x.length;i++){
		var datetemp = x[i].start;
		const formatedDatetemp = dayjs(datetemp).format("DD-MM-YYYY");
		if( formatedDatetemp == formatedDate ){
		 temp.push(formatedDate);
		}
	}



       if(count == 0 && temp.length == 0 ){
       	var date = info.start;
        const formatedDate = dayjs(date).format("YYYY-MM-DD");
       	document.getElementById('tanggal_ibadah').value = formatedDate;
       	$("#create_jadwal").modal();
			
		}
		
		
		
	}
    // this allows things to be dropped onto the calendar !!!
    });

  calendar.render();


</script>

<script >
	$(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    //Initialize Select2 Elements$
   
    $('.select2').select2({tags: true});
     $('.select2-special').select2();
});
</script>
@endsection