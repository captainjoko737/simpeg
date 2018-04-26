@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-chain"></i> Bimbingan Seminar</a></li>
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
              <h3 class="box-title">Data {{ $title }}</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <div class="button pull-right">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="add()"><i class="fa fa-plus"></i> Tambah {{ $title }}</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th style="width:'5%'">No</th>
                  <th>Nama Bimbingan</th>
                  <th class="text-center">Periode</th>
                  <th class="text-center">Semester</th>
                  <th class="text-center">Volume Kegiatan</th>
                  <th class="text-center">Angka Kredit</th>

                  <th>Bukti Fisik</th>
                </tr>

                @foreach ($result as $key => $value)
                
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->nama_bimbingan }}</td>
                    <td class="text-center">{{ $value->tahun }}</td>
                    <td class="text-center">{{ $value->semester }} </td>
                    <td class="text-center">{{ $value->jumlah_sks }}</td>
                    <td class="text-center">{{ $value->angka_kredit }}</td>
                    <td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik }}</a> </td>
                    <td><button class="btn btn-sm btn-info" onclick="edit({{$value->id_bimbingan_seminar }})"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{ $value->id_bimbingan_seminar }})"><i class="fa fa-trash"></i> Delete</button></td>
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
    
    function add() {
        location.href='/bimbingan/seminar/add';
    }

    function edit(id_bimbingan_seminar) {
        console.log('EDIT ', id_bimbingan_seminar);
        location.href='/bimbingan/seminar/edit/'+id_bimbingan_seminar;
    }

    var _token = $('input[name="_token"]').val();

    var selectedID = 0;

    function ButtonDelete(id_bimbingan_seminar) {
        console.log(id_bimbingan_seminar);

        selectedID = id_bimbingan_seminar;
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
                "id_bimbingan_seminar" : selectedID,
                "_token" : _token};

          $.ajax({
             type: 'delete',
             url: '{{url("/bimbingan/seminar/delete")}}',
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