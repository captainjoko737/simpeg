@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-mortar-board"></i> Kualifikasi</a></li>
      </ol>
    </section>

    <!-- PROFILE -->

    <section class="content">
      
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>

            {!! csrf_field() !!}
            

            {!! Form::open(array('route' => 'putPendidikanFormal','files'=>true, 'method' => 'PUT')) !!}
            <div class="box-body">  

                <div class="form-group hide">
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_user" name="id_user" value="{{ $id_user }}">
                </div>

                <div class="form-group hide">
                  <label>id Pendidikan Formal</label>
                  <input type="text" class="form-control" required id="id_pendidikan_formal" name="id_pendidikan_formal" value="{{ $pendidikanFormal['id_pendidikan_formal'] }}">
                </div>

                <div class="form-group">
                  <label>Jenjang Studi</label>
                  <input type="text" class="form-control" required id="jenjang_studi" name="jenjang_studi" placeholder="Masukkan Jenjang Studi" value="{{ $pendidikanFormal['jenjang_studi'] }}">
                </div>

                <div class="form-group">
                  <label>Gelar Akademik</label>
                  <input type="text" class="form-control" required id="gelar_akademik" name="gelar_akademik" placeholder="Masukkan Gelar Akademik" value="{{ $pendidikanFormal['gelar_akademik'] }}">
                </div>

                <div class="form-group">
                  <label>Bidang Studi</label>
                  <input type="text" class="form-control" required id="bidang_studi" name="bidang_studi" placeholder="Masukkan Bidang Studi" value="{{ $pendidikanFormal['bidang_studi'] }}">
                </div>

                <div class="form-group">
                  <label>Perguruan Tinggi</label>
                  <input type="text" class="form-control" required id="perguruan_tinggi" name="perguruan_tinggi" placeholder="Masukkan Perguruan Tinggi" value="{{ $pendidikanFormal['perguruan_tinggi'] }}">
                </div>

                <div class="form-group">
                  <label>Fakultas</label>
                  <input type="text" class="form-control" required id="fakultas" name="fakultas" placeholder="Masukkan Fakultas" value="{{ $pendidikanFormal['fakultas'] }}">
                </div>

                <div class="form-group">
                  <label>Program Studi</label>
                  <input type="text" class="form-control" required id="program_studi" name="program_studi" placeholder="Masukkan Program Studi" value="{{ $pendidikanFormal['program_studi'] }}">
                </div>

                <div class="form-group">
                  <label>Tahun Masuk</label>
                  <input type="text" class="form-control" required id="tahun_masuk" name="tahun_masuk" placeholder="Masukkan Tahun Masuk" value="{{ $pendidikanFormal['tahun_masuk'] }}">
                </div>

                <div class="form-group">
                  <label>Tahun Lulus</label>
                  <input type="text" class="form-control" required id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus" value="{{ $pendidikanFormal['tahun_lulus'] }}">
                </div>

                <div class="form-group">
                  <label>Tanggal Kelulusan</label>
                  <input type="text" class="form-control" required id="tanggal_kelulusan" name="tanggal_kelulusan" placeholder="Masukkan Tanggal Kelulusan" value="{{ $pendidikanFormal['tanggal_kelulusan'] }}">
                </div>

                <div class="form-group">
                  <label>Bukti Fisik Deskripsi</label>
                  <input type="text" class="form-control" required id="bukti_fisik_desc" name="bukti_fisik_desc" placeholder="Masukkan Bukti Fisik Deskripsi" value="{{ $pendidikanFormal['bukti_fisik_desc'] }}">
                </div>

                <div class="form-group has-feedback">
                  <label>Bukti Fisik</label>
                  {!! Form::file('file', array( 'accept' => 'application/pdf')) !!}
                </div>
                
                <div class="row">
                  <div class="col-xs-4">
                    <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-warning btn-block btn-flat">Kembali</button>
                  </div>
                  <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan Data</button>
                  </div>
              </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
      
    </section>
    
@endsection

@section('js')

<script type="text/javascript">


</script>

@endsection








