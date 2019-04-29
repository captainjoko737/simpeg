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
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="deleteKepangkatan()">Hapus</button>
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
              <h3 class="box-title">Data Kepangkatan</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!--  -->

                  <div class="button pull-right">
                    <button type="button" class="btn btn-primary btn-sm" onclick="tambahKepangkatan()"><i class="fa fa-plus"></i> Tambah</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                  <th>Golongan / Pangkat</th>
                  <th>Nomor SK Kepangkatan</th>
                  <th>Tanggal SK</th>
                  <th>Terhitung Mulai Tanggal</th>
                  <th>Angka Kredit</th>
                  <th>Masa Kerja (Tahun)</th>
                  <th>Masa Kerja (Bulan)</th>
                  <th>Bukti Fisik</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($kepangkatan as $key => $value)
                
                      <tr>
                        <td >{{ $value['golongan_pangkat'] }}</td>
                        <td>{{ $value['nomor_sk_kepangkatan'] }}</td>
                        <td class="text-center">{{ $value['tanggal_sk'] }} </td>
                        <td class="text-center"> {!! $value['terhitung_mulai_tanggal'] !!}</td>
                        <td class="text-center">{!! $value['angka_kredit'] !!}</td>
                        <td class="text-center">{{ $value['masa_kerja_tahun'] }}</td>
                        <td class="text-center">{{ $value['masa_kerja_bulan'] }}</td>
                        <td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a> </td>
                        <td><button class="btn btn-sm btn-info" onclick="editKepangkatan({{$value['id_kepangkatan']}})"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{$value['id_kepangkatan']}})"><i class="fa fa-trash"></i> Delete</button></td>
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

    function tambahKepangkatan() {
        location.href='/profile/kepangkatan/add';
    }

    function editKepangkatan(id_kepangkatan) {
        console.log('EDIT ', id_kepangkatan);
        location.href='/profile/kepangkatan/edit/'+id_kepangkatan;
    }


    var _token = $('input[name="_token"]').val();

    var selectedID = 0;

    function ButtonDelete(id_kepangkatan) {
        console.log(id_kepangkatan);

        selectedID = id_kepangkatan;
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

    function deleteKepangkatan() {
        console.log('INI AKAN DI HAPUS : ', selectedID);

        var data = {
                "id_kepangkatan" : selectedID,
                "_token" : _token};

          $.ajax({
             type: 'delete',
             url: '{{url("/profile/kepangkatan/delete")}}',
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








