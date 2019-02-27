@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-archive"></i> Penelitian</a></li>
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
            
            {!! Form::open(array('route' => 'postPenelitian','files'=>true)) !!}
            <div class="box-body">  

                <div class="form-group hide">
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_user" name="id_user" value="{{ $id_user }}">
                </div>

                <div class="form-group">
                  <label>Judul Kegiatan</label>
                  <input type="text" class="form-control" required id="judul_kegiatan" name="judul_kegiatan" placeholder="Masukkan Judul Kegiatan" value="">
                </div>

                <div class="form-group">
                  <label>Kategori Kegiatan</label>
                  <input type="text" class="form-control" required id="kategori_kegiatan" name="kategori_kegiatan" placeholder="Masukkan Kategori Kegiatan" value="">
                </div>

                <div class="form-group">
                  <label>Lembaga IPTEK</label>
                  <input type="text" class="form-control" required id="lembaga_iptek" name="lembaga_iptek" placeholder="Masukkan Lembaga IPTEK" value="">
                </div>

                <div class="form-group">
                  <label>Kelompok Bidang</label>
                  <input type="text" class="form-control" required id="kelompok_bidang" name="kelompok_bidang" placeholder="Masukkan Kelompok Bidang" value="">
                </div>

                <div class="form-group">
                  <label>Jenis SKIM</label>
                  <input type="text" class="form-control" required id="jenis_skim" name="jenis_skim" placeholder="Masukkan Jenis SKIM" value="">
                </div>

                <div class="form-group">
                  <label>Lokasi Kegiatan</label>
                  <input type="text" class="form-control" required id="lokasi_kegiatan" name="lokasi_kegiatan" placeholder="Masukkan Lokasi Kegiatan" value="">
                </div>

                <div class="form-group">
                  <label>Tahun Usulan</label>
                  <input type="text" class="form-control" required id="tahun_usulan" name="tahun_usulan" placeholder="Masukkan Tahun Usulan" value="">
                </div>

                <div class="form-group">
                  <label>Tahun Kegiatan</label>
                  <input type="text" class="form-control" required id="tahun_kegiatan" name="tahun_kegiatan" placeholder="Masukkan Tahun Kegiatan" value="">
                </div>

                <div class="form-group">
                  <label>Tahun Pelaksanaan</label>
                  <input type="text" class="form-control" required id="tahun_pelaksanaan" name="tahun_pelaksanaan" placeholder="Masukkan Tahun Pelaksanaan" value="">
                </div>

                <div class="form-group">
                  <label>Lama Kegiatan</label>
                  <input type="text" class="form-control" required id="lama_kegiatan" name="lama_kegiatan" placeholder="Masukkan Lama Kegiatan" value="">
                </div>

                <div class="form-group">
                  <label>Tahun Pelaksanan Ke :</label>
                  <input type="text" class="form-control" required id="tahun_pelaksanaan_ke" name="tahun_pelaksanaan_ke" placeholder="Masukkan Tahun Pelaksanaan" value="">
                </div>

                <div class="form-group">
                  <label>Dana Dari DIKTI</label>
                  <input type="text" class="form-control" required id="dana_dari_dikti" name="dana_dari_dikti" placeholder="Masukkan Dana dari Dikti" value="">
                </div>

                <div class="form-group">
                  <label>Dana dari Perguruan Tinggi</label>
                  <input type="text" class="form-control" required id="dana_dari_perguruan_tinggi" name="dana_dari_perguruan_tinggi" placeholder="Masukkan Dana dari Perguruan Tinggi" value="">
                </div>

                <div class="form-group">
                  <label>Dana dari Institusi Lain</label>
                  <input type="text" class="form-control" required id="dana_dari_institusi_lain" name="dana_dari_institusi_lain" placeholder="Masukkan Dana dari Institusi Lain" value="">
                </div>

                <div class="form-group">
                  <label>In Kind</label>
                  <input type="text" class="form-control" required id="in_kind" name="in_kind" placeholder="Masukkan In Kind" value="">
                </div>

                <div class="form-group">
                  <label>Nomor SK Penugasan</label>
                  <input type="text" class="form-control" required id="nomor_sk_penugasan" name="nomor_sk_penugasan" placeholder="Masukkan Nomor SK Penugasan" value="">
                </div>

                <div class="form-group">
                  <label>Tanggal SK Penugasan (TTTT-BB-HH)</label>
                  <input type="text" class="form-control" required id="tanggal_sk_penugasan" name="tanggal_sk_penugasan" placeholder="Masukkan Tanggal SK Penugasan" value="">
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








