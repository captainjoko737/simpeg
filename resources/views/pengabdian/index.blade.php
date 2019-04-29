@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-chain"></i> Pengabdian</a></li>
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
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="deleteJabatanStruktural()">Hapus</button>
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
              <h3 class="box-title">Data Jabatan Struktural</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <div class="button pull-right">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="tambahJabatanStruktural()"><i class="fa fa-plus"></i> Tambah </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example" class="display nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Jabatan / Tugas</th>
                    <th>Kategori Kegiatan</th>
                    <th>Nomor SK Jabatan Struktural</th>
                    <th>Terhitung Mulai Tanggal</th>
                    <th>Lokasi Penugasan</th>
                    <th>Bukti Fisik</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($jabatan_struktural as $key => $value)
                
                      <tr>
                        <td>{{ $value['jabatan_tugas'] }}</td>
                        <td>{{ $value['kategori_kegiatan'] }}</td>
                        <td>{{ $value['nomor_sk_jabatan_struktural'] }} </td>
                        <td>{!! $value['terhitung_mulai_tanggal'] !!}</td>
                        <td>{!! $value['lokasi_penugasan'] !!}</td>
                        <td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a> </td>
                        <td><button class="btn btn-sm btn-info" onclick="editJabatanStruktural({{$value['id_jabatan_struktural']}})"><i class="fa fa-pencil"></i> </button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{$value['id_jabatan_struktural']}})"><i class="fa fa-trash"></i> </button></td>
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
    
    function tambahJabatanStruktural() {
        location.href='/pengabdian/jabatanStruktural/add';
    }

    function editJabatanStruktural(id_jabatan_struktural) {
        console.log('EDIT ', id_jabatan_struktural);
        location.href='/pengabdian/jabatanStruktural/edit/'+id_jabatan_struktural;
    }

    var _token = $('input[name="_token"]').val();

    var selectedID = 0;

    function ButtonDelete(id_jabatan_struktural) {
        console.log(id_jabatan_struktural);

        selectedID = id_jabatan_struktural;
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

    function deleteJabatanStruktural() {
        console.log('INI AKAN DI HAPUS : ', selectedID);

        var data = {
                "id_jabatan_struktural" : selectedID,
                "_token" : _token};

          $.ajax({
             type: 'delete',
             url: '{{url("/pengabdian/jabatanStruktural/delete")}}',
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