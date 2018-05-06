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
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <div class="button pull-right">
                    <!-- <button type="submit" class="btn btn-primary btn-sm" onclick="add()"><i class="fa fa-plus"></i> Tambah</button> -->
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <!-- /.row -->
              <div>
                  <!-- END ALERTS AND CALLOUTS -->
                  <!-- START CUSTOM TABS -->
                  
                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
                          <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
                          <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
                          
                          <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <b>How to use:</b>

                            <p>Exactly like the original bootstrap tabs except you should use
                              the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                            A wonderful serenity has taken possession of my entire soul,
                            like these sweet mornings of spring which I enjoy with my whole heart.
                            I am alone, and feel the charm of existence in this spot,
                            which was created for the bliss of souls like mine. I am so happy,
                            my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                            that I neglect my talents. I should be incapable of drawing a single stroke
                            at the present moment; and yet I feel that I never was a greater artist than now.
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_2">
                            The European languages are members of the same family. Their separate existence is a myth.
                            For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                            in their grammar, their pronunciation and their most common words. Everyone realizes why a
                            new common language would be desirable: one could refuse to pay expensive translators. To
                            achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                            words. If several languages coalesce, the grammar of the resulting language is more simple
                            and regular than that of the individual languages.
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_3">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                            like Aldus PageMaker including versions of Lorem Ipsum.
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      
    </section>
@endsection

@section('js')

<script type="text/javascript">
    
    function detail() {
        location.href='/PAK/detail';
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