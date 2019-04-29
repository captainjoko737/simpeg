@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-balance-scale"></i> {{ $subtitle }}</a></li>
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
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="drop()">Hapus</button>
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
              <h3 class="box-title">Data</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <div class="button pull-right">
                    <button type="button" class="btn btn-primary btn-sm" onclick="add()"><i class="fa fa-plus"></i> Tambah</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                      <th>Tingkat Kegiatan</th>
                      <th>Nama Kegiatan</th>
                      <th>Tanggal</th>
                      <th>Satuan Hasil</th>
                      <th>Volume Kegiatan</th>
                      <th>Angka Kredit</th>
                      <th>Jumlah Angka Kredit</th>
                      <th>Bukti Fisik</th>
                      <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $key => $value)
              
                      <tr>
                        <td>{{ $value->tingkat }}</td>
                        <td>{{ $value->nama_kegiatan }}</td>
                        <td class="text-center">{{ $value->tanggal_kegiatan }}</td>
                        <td class="text-center">{{ $value->satuan_hasil }} </td>
                        <td class="text-center">{{ $value->volume_kegiatan }}</td>
                        <td class="text-center">{{ $value->angka_kredit }}</td>
                        <td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
                        <td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik }}</a> </td>
                        <td><button class="btn btn-sm btn-info" onclick="edit({{$value->id_penunjang }})"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{ $value->id_penunjang }})"><i class="fa fa-trash"></i> Delete</button></td>
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

@section('css')
  
@endsection

@section('js')

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->


<script type="text/javascript">

    function add() {
        location.href='/penunjang/g/add';
    }

    function edit(id) {
        console.log('EDIT ', id);
        location.href='/penunjang/g/edit/'+id;
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

    function drop() {
        console.log('INI AKAN DI HAPUS : ', selectedID);

        var data = {
                "id_penunjang" : selectedID,
                "_token" : _token};

          $.ajax({
             type: 'delete',
             url: '{{url("/penunjang/g/delete")}}',
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