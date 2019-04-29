@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-chain"></i> Mengembangkan Program Kuliah</a></li>
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
                    <button type="submit" class="btn btn-primary btn-sm" onclick="add()"><i class="fa fa-plus"></i> Tambah</button>
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
                    <th style="width:'5%'">No</th>
                    <th>Nama Program</th>
                    <th class="text-center">Periode</th>
                    <th class="text-center">Bukti Fisik</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($result as $key => $value)
                  
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $value->nama }}</td>
                      <td class="text-center">{{ $value->tahun }}</td>
                      <td class="text-center"><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }} </a></td>
                     
                      
                      
                      <td class="text-center"> <button class="btn btn-sm btn-info" onclick="edit({{$value->id_program_kuliah }})"><i class="fa fa-pencil"></i></button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{ $value->id_program_kuliah }})"><i class="fa fa-trash"></i></button></td>
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
        location.href='/program/kuliah/add';
    }

    function edit(id) {
        console.log('EDIT ', id);
        location.href='/program/kuliah/edit/'+id;
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
                "id_program_kuliah" : selectedID,
                "_token" : _token};

          $.ajax({
             type: 'delete',
             url: '{{url("/program/kuliah/delete")}}',
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