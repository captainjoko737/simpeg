@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-chain"></i> Pelaksanaan Pendidikan</a></li>
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
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="deleteConfirm()">Hapus</button>
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
              <h3 class="box-title">Data Pelaksanaan Pendidikan</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <div class="button pull-right">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="tambahPelaksanaanPendidikan()"><i class="fa fa-plus"></i> Tambah Pelaksanaan Pendidikan</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nama Pelaksanaan</th>
                  <th class="text-center">Semester</th>
                  <th class="text-center">Jumlah SKS</th>
                  <th class="text-center">Angka Kredit</th>
                  <th class="text-center">Periode</th>
                  <th>Bukti Fisik</th>
                </tr>

                @foreach ($result as $key => $value)
                
                  <tr>
                    <td>{{ $value['nama_pelaksanaan'] }}</td>
                    <td class="text-center">{{ $value['semester'] }}</td>
                    <td class="text-center">{{ $value['jumlah_sks'] }} </td>
                    <td class="text-center">{!! $value['angka_kredit'] !!}</td>
                    <td class="text-center">{!! $value['periode'] !!}</td>
                    <td><a href="{{ url('assets/bukti_fisik/').'/'.$value['bukti_fisik'] }}" target="_blank">{!! $value['bukti_fisik'] !!}</a> </td>
                    <td><button class="btn btn-sm btn-info" onclick="edit({{$value['id_pelaksanaan_pendidikan']}})"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{ $value['id_pelaksanaan_pendidikan'] }})"><i class="fa fa-trash"></i> Delete</button></td>
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
    
    function tambahPelaksanaanPendidikan() {
        location.href='/pelaksanaan/pendidikan/add';
    }

    function edit(id_pelaksanaan_pendidikan) {
        console.log('EDIT ', id_pelaksanaan_pendidikan);
        location.href='/pelaksanaan/pendidikan/edit/'+id_pelaksanaan_pendidikan;
    }

    var _token = $('input[name="_token"]').val();

    var selectedID = 0;

    function ButtonDelete(id_pelaksanaan_pendidikan) {
        console.log(id_pelaksanaan_pendidikan);

        selectedID = id_pelaksanaan_pendidikan;
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

    function deleteConfirm() {
        console.log('INI AKAN DI HAPUS : ', selectedID);

        var data = {
                "id_pelaksanaan_pendidikan" : selectedID,
                "_token" : _token};

          $.ajax({
             type: 'delete',
             url: '{{url("/pelaksanaan/pendidikan/delete")}}',
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