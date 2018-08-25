@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-mortar-board"></i> Dosen</a></li>
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
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <div class="button pull-right">
                    @if($user['is_admin_prodi'] == "hidden")
                        <button type="submit" class="btn btn-primary btn-sm" onclick="add()"><i class="fa fa-plus"></i> Tambah</button>
                    @endif
                  </div>
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

              <table id="example" class="display nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>Gelar</th>
                    <th>Bidang Studi</th>
                    <th>Jenis Kelamin</th>
                    <th>TTL</th>
                    <th>Agama</th>
                    <th>Kewarganegaraan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($result as $key => $value)
                  
                    <tr>
                      <td>{{ $value->username }}</td>
                      <td>{{ $value->password_readable }}</td>
                      <td>{{ $value->nama }}</td>
                      <td>{{ $value->pendidikan->gelar_akademik }}</td>
                      <td>{{ $value->pendidikan->bidang_studi }}</td>
                      <td>{{ $value->jenis_kelamin }}</td>
                      <td>{{ $value->tempat_lahir }} {{ $value->tanggal_lahir }}</td>
                      <td>{{ $value->agama }}</td>
                      <td>{{ $value->kewarganegaraan }}</td>
                      <td> 

                          <button class="btn btn-sm btn-success" onclick="view({{$value->id_user }})"><i class="fa fa-user" alt="lala"></i></button> 
                            
                            @if($user['is_admin_prodi'] == "hidden")
                                <button class="btn btn-sm btn-info" onclick="edit({{$value->id_user }})"><i class="fa fa-pencil" alt="lala"></i></button>
                            @endif
                           
                          
                          <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{ $value->id_user }})"><i class="fa fa-trash"></i></button>
                      </td>
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
    
    function add() {
        location.href='/dosen/add';
    }

    function edit(id) {
        console.log('EDIT ', id);
        location.href='/dosen/edit/'+id;
    }

    function view(id) {
        console.log('EDIT ', id);
        location.href='/dosen/view/'+id;
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
                "id_user" : selectedID,
                "_token" : _token};

          $.ajax({
             type: 'delete',
             url: '{{url("/dosen/drop")}}',
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