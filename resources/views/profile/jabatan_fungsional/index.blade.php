@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
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
            <p>Anda yakin akan menghapus ini ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="deleteJabatanFungsional()">Hapus</button>
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
              <h3 class="box-title">Data Jabatan Fungsional</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <div class="button pull-right">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="tambahJabatanFungsional()"><i class="fa fa-plus"></i> Tambah </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="box-body">
              <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                      <th>Jabatan Fungsional</th>
                      <th style="width : 10%">Nomor SK</th>
                      <th>Tanggal Mulai</th>
                      <th>Kelebihan Pengajaran</th>
                      <th>Penelitian</th>
                      <th>Pengabdian Masyarakat</th>
                      <th>Kegiatan Penunjang</th>
                      <th>Bukti Fisik</th>
                      <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($jabatan_fungsional as $key => $value)
              
                    <tr>
                      <td>{{ $value['jabatan_fungsional'] }}</td>
                      <td>{{ $value['nomor_sk'] }}</td>
                      <td>{{ $value['terhitung_mulai_tanggal'] }} </td>
                      <td>{!! $value['kelebihan_pengajaran'] !!}</td>
                      <td>{!! $value['kelebihan_penelitian'] !!}</td>
                      <td>{{ $value['kelebihan_pengabdian_masyarakat'] }}</td>
                      <td>{{ $value['kelebihan_kegiatan_penunjang'] }}</td>
                      <td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a> </td>
                      <td style="width : 15%"><button class="btn btn-sm btn-info" onclick="editJabatanFungsional({{$value['id_jabatan_fungsional']}})"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{$value['id_jabatan_fungsional']}})"><i class="fa fa-trash"></i> Delete</button></td>
                    </tr>

                  @endforeach
                </tbody>
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

    function tambahJabatanFungsional() {
        location.href='/profile/jabatanFungsional/add';
    }

    function editJabatanFungsional(id_jabatanFungsional) {
        console.log('EDIT ', id_jabatanFungsional);
        location.href='/profile/jabatanFungsional/edit/'+id_jabatanFungsional;
    }


    var _token = $('input[name="_token"]').val();

  
  var selectedID = 0;

  function ButtonDelete(id_jabatanFungsional) {
      console.log(id_jabatanFungsional);

      selectedID = id_jabatanFungsional;
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

  function deleteJabatanFungsional() {
      console.log('INI AKAN DI HAPUS : ', selectedID);

      var data = {
              "id_jabatan_fungsional" : selectedID,
              "_token" : _token};

        $.ajax({
           type: 'delete',
           url: '{{url("/profile/jabatanFungsional/delete")}}',
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