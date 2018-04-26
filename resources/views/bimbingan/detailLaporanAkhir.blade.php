@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-archive"></i> Detail Bimbingan Akhir</a></li>
      </ol>
    </section>

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
                  <th>Nama Bimbingan</th>
                  <th class="text-center">Periode</th>
                  <th class="text-center">Semester</th>
                </tr>

                <tr>
                  <td>{{ $result->jenis_bimbingan }}</td>
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
            <div class="box-header">
              <h3 class="box-title"> Data Mahasiswa </h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                  <div class="button pull-right">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="add()"><i class="fa fa-plus"></i> Tambah </button>
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
                    <th class="text-center">{{ $value->bukti_fisik_desc }}</th>
                    <td class="text-center"><button class="btn btn-sm btn-info" onclick="edit({{ $value->id_mahasiswa_bimbingan }})"><i class="fa fa-pencil"></i> Edit</button> <button class="btn btn-sm btn-danger" onclick="ButtonDelete({{ $value->id_mahasiswa_bimbingan }})"><i class="fa fa-trash"></i> Delete</button></td></td>
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
  
  function detail(id_penelitian) {
    console.log(id_penelitian);

    location.href='detailPenelitian/'+id_penelitian;
  }

  function back() {
    location.href='/bimbingan/laporanAkhir';
  }
  
</script>

@endsection





























