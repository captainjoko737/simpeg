@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-mortar-board"></i> Kualifikasi</a></li>
      </ol>
    </section>

    <!-- Modal -->
    <div class="modal fade modal-warning" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Perhatian</h4>
          </div>
          <div class="modal-body">
            <p>Anda yakin akan menghapus data ini ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="deletePendidikanFormal()">Hapus</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pendidikan Formal</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <div class="button pull-right">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="tambahPendidikanFormal()"><i class="fa fa-plus"></i> Tambah Pendidikan Formal</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Janjang Studi</th>
                  <th>Gelar Akademik</th>
                  <th>Bidang Studi</th>
                  <th>Perguruan Tinggi</th>
                  <th>Fakultas</th>
                  <th>Program Studi</th>
                  <th>Tahun Masuk</th>
                  <th>Tahun Lulus</th>
                  <th>Tanggal Kelulusan</th>
                </tr>
                
                @foreach ($pendidikan_formal as $key => $value)
                
                  <tr>
                    <td>{{ $value['jenjang_studi'] }}</td>
                    <td>{{ $value['gelar_akademik'] }}</td>
                    <td>{{ $value['bidang_studi'] }} </td>
                    <td>{!! $value['perguruan_tinggi'] !!}</td>
                    <td>{!! $value['fakultas'] !!}</td>
                    <td>{{ $value['program_studi'] }}</td>
                    <td>{{ $value['tahun_masuk'] }}</td>
                    <td>{{ $value['tahun_lulus'] }}</td>
                    <td>{{ $value['tanggal_kelulusan'] }}</td>
                    <td><button class="btn btn-sm btn-info" onclick="editPendidikanFormal({{$value['id_pendidikan_formal']}})"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{$value['id_pendidikan_formal']}})"><i class="fa fa-trash"></i> Delete</button></td>
                  </tr>

                @endforeach

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      
    </section>
@endsection

@section('js')

<script type="text/javascript">

    function tambahPendidikanFormal() {
        location.href='/kualifikasi/pendidikanFormal/add';
    }

    function editPendidikanFormal(id_pendidikan_formal) {
        console.log('EDIT ', id_pendidikan_formal);
        location.href='/Kualifikasi/pendidikanFormal/edit/'+id_pendidikan_formal;
    }


    var _token = $('input[name="_token"]').val();

  
  var selectedID = 0;

  function ButtonDelete(id_pendidikan_formal) {
      console.log(id_pendidikan_formal);

      selectedID = id_pendidikan_formal;
      $("#myModal").on("show", function() {    
          $("#myModal a.btn").on("click", function(e) {
              console.log("button pressed");
              $("#myModal").modal('hide');     
          });
      });
      $("#myModal").on("hide", function() {   
          $("#myModal a.btn").off("click");
      });

      $("#myModal").on("hidden", function() {  
          $("#myModal").remove();
      });

      $("#myModal").modal({                    
        "backdrop"  : "static",
        "keyboard"  : true,
        "show"      : true                     
      });
  }

  function deletePendidikanFormal() {
      console.log('INI AKAN DI HAPUS : ', selectedID);

      var data = {
              "id_pendidikan_formal" : selectedID,
              "_token" : _token};

        $.ajax({
           type: 'delete',
           url: '{{url("/Kualifikasi/pendidikanFormal/delete")}}',
           data: data,
           success: function(data) {

            // console.log('SUCCESS');
            location.reload();
              // console.log(data);            
           },
           error: function(data) {
              console.log(data);
               console.log("error");
           }
        });

  }

</script>

@endsection