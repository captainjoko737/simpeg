@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-archive"></i> Karya Ilmiah</a></li>
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

            <div class="box-body no-padding">
                <!-- /.row -->
              <div class="box-body">
                  <!-- END ALERTS AND CALLOUTS -->
                  <!-- START CUSTOM TABS -->
                  
                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Hasil Penelitian atau pemikiran yang dipublikasikan</a></li>
                          <li><a href="#tab_2" data-toggle="tab">Hasil Penelitian atau hasil pemikiran yang tidak dipublikasikan ( tersimpan di perpustakaan perguruan tinggi )</a></li>
                          
                          <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <div class="box-body">
                              <table id="example" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
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
                                    @foreach ($is_publikasi as $key => $value)
                              
                                      <tr>
                                        <td>{{ $value->nama_kegiatan }}</td>
                                        <td class="text-center">{{ $value->tanggal }}</td>
                                        <td class="text-center">{{ $value->satuan_hasil }} </td>
                                        <td class="text-center">{{ $value->volume_kegiatan }}</td>
                                        <td class="text-center">{{ $value->angka_kredit }}</td>
                                        <td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
                                        <td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik }}</a> </td>
                                        <td><button class="btn btn-sm btn-info" onclick="edit({{$value->id_karya_ilmiah }})"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{ $value->id_karya_ilmiah }})"><i class="fa fa-trash"></i> Delete</button></td>
                                      </tr>

                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_2">
                            <div class="box-body">
                              <table id="example-2" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
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
                                    @foreach ($is_not_publikasi as $key => $value)
                              
                                      <tr>
                                        <td>{{ $value->nama_kegiatan }}</td>
                                        <td class="text-center">{{ $value->tanggal }}</td>
                                        <td class="text-center">{{ $value->satuan_hasil }} </td>
                                        <td class="text-center">{{ $value->volume_kegiatan }}</td>
                                        <td class="text-center">{{ $value->angka_kredit }}</td>
                                        <td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
                                        <td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik }}</a> </td>
                                        <td><button class="btn btn-sm btn-info" onclick="edit({{$value->id_karya_ilmiah }})"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{ $value->id_karya_ilmiah }})"><i class="fa fa-trash"></i> Delete</button></td>
                                      </tr>

                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_3">
                            The European languages
                          </div>
                           <div class="tab-pane" id="tab_4">
                            The European languages
                          </div>
                          <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                      </div>
                      <!-- nav-tabs-custom -->
                    </div>
                    <!-- /.col -->

                    
                  </div>
                  <!-- /.row -->
                  <!-- END CUSTOM TABS -->
                  <!-- START PROGRESS BARS -->
              </div>  
            </div>
            <!-- /.box-header -->
            
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
        location.href='/penelitian/publikasiKarya/add';
    }

    function edit(id) {
        console.log('EDIT ', id);
        location.href='/penelitian/publikasiKarya/edit/'+id;
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

    function deleteJabatanStruktural() {
        console.log('INI AKAN DI HAPUS : ', selectedID);

        var data = {
                "id_karya_ilmiah" : selectedID,
                "_token" : _token};

          $.ajax({
             type: 'delete',
             url: '{{url("/penelitian/publikasiKarya/delete")}}',
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