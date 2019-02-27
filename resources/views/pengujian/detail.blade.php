@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-archive"></i> Detail Penguji Ujian Akhir</a></li>
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
              <h3 class="box-title">Periode : {{ $result->tahun }} </h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  

                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-striped">
                <tr>
                  <th class="text-center">Periode</th>
                  <th class="text-center">Semester</th>
                </tr>

                <tr>
                  <td class="text-center">{{ $result->tahun }}</td>
                  <td class="text-center">{{ $result->semester }}</td>
                </tr>
              </table>
              <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            @if(Session::has('message'))
                  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                  {{ session('message') }}
                  </div>
              @endif

              @if(Session::has('warning'))
                  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-times"></i> Perhatian!</h4>
                  <ul class="list-unstyled">
                      <li>{{ session('warning') }}</li>
                      
                  </ul>
              </div>
              @endif

              @if(Session::has('error'))
                  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-times"></i> Gagal!</h4>
                  <ul class="list-unstyled">
                      <li>{{ session('error') }}</li>
                      
                  </ul>
              </div>
              @endif
            <div class="box-header">
              <h3 class="box-title"> Data Mahasiswa Bimbingan</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                  <div class="button pull-right">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="add({{ $id }})"><i class="fa fa-plus"></i> Tambah </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-striped">
                <tr>
                  <th>NIM Mahasiswa</th>
                  <th class="text-center">Nama Mahasiswa</th>
                  <th class="text-center">Bukti Fisik</th>
                  <th class="text-center">Aksi</th>
                </tr>


                @foreach ($mahasiswa as $key => $value)
                  <tr>
                    <td>{{ $value->nim_mahasiswa }}</td>
                    <td class="text-center">{{ $value->nama_mahasiswa }}</td>
                    <td class="text-center"><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
                    <td class="text-center"><button class="btn btn-sm btn-info" onclick="edit({{ $value->id_mahasiswa_ujian_akhir }})"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{ $value->id_mahasiswa_ujian_akhir }})"><i class="fa fa-trash"></i> Delete</button></td></td>
                  </tr>

                @endforeach

              </table>
              <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box-footer clearfix">
              <button class="btn btn-sm btn-info" onclick="back()"><i class="fa fa-chevron-left"> </i> Kembali</button>
          </div>  
        </div>
      </div>
      
    </section>

@endsection

@section('js')

<script type="text/javascript">

  function add(id) {
      location.href='/pengujian/detail/add/' + id;
  }

  function edit(id) {
      console.log('EDIT ', id);
      location.href='/pengujian/detail/edit/'+id;
  }

  function detail(id_penelitian) {
    console.log(id_penelitian);

    location.href='detailPenelitian/'+id_penelitian;
  }

  function back() {
    location.href='/pengujian';
  }

  var _token = $('input[name="_token"]').val();

    var selectedID = 0;

    function ButtonDelete(id) {
        console.log(id);

        selectedID = id;
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
                "id_mahasiswa_ujian_akhir" : selectedID,
                "_token" : _token};

          $.ajax({
             type: 'delete',
             url: '{{url("/pengujian/detail/delete")}}',
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





























