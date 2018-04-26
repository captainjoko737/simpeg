@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-archive"></i> Penelitian</a></li>
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
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="deletePenelitian()">Hapus</button>
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
              <h3 class="box-title">Data Penelitian</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <div class="button pull-right">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="tambahPenelitian()"><i class="fa fa-plus"></i> Tambah Penelitian</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Judul Kegiatan</th>
                  <th>Kategori Kegiatan</th>
                  <th>Lembaga IPTEK</th>
                  <th>Kelompok Bidang</th>
                  <th>Lokasi Kegiatan</th>
                  <th class="text-center">Aksi</th>
                </tr>

                @foreach ($penelitian as $key => $value)
                
                  <tr>
                    <td>{{ $value['judul_kegiatan'] }}</td>
                    <td>{{ $value['kategori_kegiatan'] }}</td>
                    <td>{{ $value['lembaga_iptek'] }} </td>
                    <td>{!! $value['kelompok_bidang'] !!}</td>
                    <td>{!! $value['lokasi_kegiatan'] !!}</td>
                    <td style="width : 19%"><button class="btn btn-sm btn-success" onclick="detail({{$value['id_penelitian']}})"><i class="fa fa-eye"></i> Detail</button> <button class="btn btn-sm btn-info" onclick="editPenelitian({{$value['id_penelitian']}})"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{$value['id_penelitian']}})"><i class="fa fa-trash"></i> Delete</button></td>
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
  
  function detail(id_penelitian) {
    console.log(id_penelitian);

    location.href='detailPenelitian/'+id_penelitian;
  }

  function tambahPenelitian() {
        location.href='/penelitian/penelitian/add';
  }

  function editPenelitian(id_penelitian) {
        console.log('EDIT ', id_penelitian);
        location.href='/penelitian/penelitian/edit/'+id_penelitian;
  }

  var _token = $('input[name="_token"]').val();

  var selectedID = 0;

  function ButtonDelete(id_penelitian) {
      console.log(id_penelitian);

      selectedID = id_penelitian;
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

  function deletePenelitian() {
      console.log('INI AKAN DI HAPUS : ', selectedID);

      var data = {
              "id_penelitian" : selectedID,
              "_token" : _token};

        $.ajax({
           type: 'delete',
           url: '{{url("/penelitian/penelitian/delete")}}',
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




























