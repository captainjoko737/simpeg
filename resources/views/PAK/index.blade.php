@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-chain"></i> Layanan PAK</a></li>
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
              <h3 class="box-title"></h3>
              <div class="button pull-left">
                <a type="button" class="btn btn-success btn-md" href="/PAK/penanggung">Pengaturan Penanggung Jawab</a>
              </div>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

              @if(Session::has('message'))
                  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                  {{ session('message') }}
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

              <table id="example" class="display nowrap" style="width:99%">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Kewarganegaraan</th>
                    <th>Angka Kredit</th>
                    <th>Aksi</th>
                  </tr>
                <thead>

                <tbody>
                  @foreach ($result as $key => $value)
                  
                    <tr>
                      <td>{{ $value->nama }}</td>
                      <td>{{ $value->nip }}</td>
                      <td>{{ $value->jenis_kelamin }}</td>
                      <td>{{ $value->agama }}</td>
                      <td>{{ $value->kewarganegaraan }}</td>
                      <td>{{ $value->angka_kredit }}</td>
                      <td> <button class="btn btn-sm btn-success" onclick="detail({{ $value->id_user }})"><i class="fa fa-search"></i> Detail PAK</button></td>
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
    
    function detail(id) {
        location.href='/PAK/detail/'+id;
    }

    function edit(id) {
        console.log('EDIT ', id);
        location.href='/bahan/pengajaran/edit/'+id;
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
                "id_bahan_pengajaran" : selectedID,
                "_token" : _token};

          $.ajax({
             type: 'delete',
             url: '{{url("/bahan/pengajaran/delete")}}',
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