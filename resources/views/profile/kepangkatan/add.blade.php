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
            

            {!! Form::open(array('route' => 'postKepangkatan','files'=>true)) !!}
            <div class="box-body">  

                <div class="form-group hide">
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_user" name="id_user" value="{{ $id_user}}">
                </div>

                <div class="form-group">
                  <label>Golongan / Pangkat</label>
                  <input type="text" class="form-control" required id="golongan_pangkat" name="golongan_pangkat" placeholder="Masukkan Golongan / Pangkat" value="">
                </div>

                <div class="form-group">
                  <label>Nomor SK Kepangkatan</label>
                  <input type="text" class="form-control" required id="nomor_sk_kepangkatan" name="nomor_sk_kepangkatan" placeholder="Masukkan Nomor SK Kepangkatan" value="">
                </div>

                <div class="form-group">
                  <label>Tanggal SK (TTTT-BB-HH)</label>
                  <input type="text" class="form-control" required id="tanggal_sk" name="tanggal_sk" placeholder="Masukkan Tanggal SK" value="">
                </div>

                <div class="form-group">
                  <label>Terhitung Mulai Tanggal (TTTT-BB-HH)</label>
                  <input type="text" class="form-control" required id="terhitung_mulai_tanggal" name="terhitung_mulai_tanggal" placeholder="Terhitung Mulai Tanggal" value="">
                </div>

                <div class="form-group">
                  <label>Angka Kredit</label>
                  <input type="text" class="form-control" required id="angka_kredit" name="angka_kredit" placeholder="Masukkan Angka Kredit" value="">
                </div>

                <div class="form-group">
                  <label>Masa Kerja dalam Tahun</label>
                  <input type="text" class="form-control" required id="masa_kerja_tahun" name="masa_kerja_tahun" placeholder="Masukkan Masa Kerja dalam Tahun" value="">
                </div>

                <div class="form-group">
                  <label>Masa Kerja dalam Bulan</label>
                  <input type="text" class="form-control" required id="masa_kerja_bulan" name="masa_kerja_bulan" placeholder="Masukkan Masa Kerja dalam Bulan" value="">
                </div>

                <div class="form-group">
                  <label>Bukti Fisik Deskripsi</label>
                  <input type="text" class="form-control" required id="bukti_fisik_desc" name="bukti_fisik_desc" placeholder="Masukkan Bukti Fisik Deskripsi" value="">
                </div>

                <div class="form-group has-feedback">
                  <label>Bukti Fisik</label>
                  {!! Form::file('file', array('required' => 'required', 'accept' => 'application/pdf')) !!}
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








