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

    <!-- PROFILE -->

    <section class="content">
      
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>

            {!! csrf_field() !!}
            

            {!! Form::open(array('route' => 'postJabatanFungsional','files'=>true)) !!}
            <div class="box-body">  

                <div class="form-group hide">
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_user" name="id_user" value="{{ $id_user }}">
                </div>

                <div class="form-group">
                  <label>Jabatan Fungsional</label>
                  <input type="text" class="form-control" required id="jabatan_fungsional" name="jabatan_fungsional" placeholder="Masukkan Jabatan Fungsional" value="">
                </div>

                <div class="form-group">
                  <label>Nomor SK </label>
                  <input type="text" class="form-control" required id="nomor_sk" name="nomor_sk" placeholder="Masukkan Nomor SK " value="">
                </div>

                <div class="form-group">
                  <label>Terhitung Mulai Tanggal (TTTT-BB-HH)</label>
                  <input type="text" class="form-control" required id="terhitung_mulai_tanggal" name="terhitung_mulai_tanggal" placeholder="Terhitung Mulai Tanggal" value="">
                </div>

                <div class="form-group">
                  <label>Terhitung Mulai Tanggal (TTTT-BB-HH)</label>
                  <input type="text" class="form-control" required id="terhitung_mulai_tanggal" name="terhitung_mulai_tanggal" placeholder="Terhitung Mulai Tanggal" value="">
                </div>

                <div class="form-group">
                  <label>Kelebihan Pengajaran</label>
                  <input type="text" class="form-control" required id="kelebihan_pengajaran" name="kelebihan_pengajaran" placeholder="Masukkan Kelebihan Pengajaran" value="">
                </div>

                <div class="form-group">
                  <label>Kelebihan Penelitian</label>
                  <input type="text" class="form-control" required id="kelebihan_penelitian" name="kelebihan_penelitian" placeholder="Masukkan Kelebihan Penelitian" value="">
                </div>

                <div class="form-group">
                  <label>Kelebihan Pengabdian Masyarakat</label>
                  <input type="text" class="form-control" required id="kelebihan_pengabdian_masyarakat" name="kelebihan_pengabdian_masyarakat" placeholder="Masukkan Kelebihan Pengabdian Masyarakat" value="">
                </div>

                <div class="form-group">
                  <label>Kelebihan Kegiatan Penunjang</label>
                  <input type="text" class="form-control" required id="kelebihan_kegiatan_penunjang" name="kelebihan_kegiatan_penunjang" placeholder="Masukkan Kelebihan Kegiatan Penunjang" value="">
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








