@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-book"></i> Bimbingan</a></li>
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
            
            {!! Form::open(array('route' => 'putBimbinganLaporanAkhirDetail','files'=>true, 'method' => 'PUT')) !!}
            <div class="box-body">  

                <div class="form-group" hidden>
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_bimbingan_laporan_akhir" name="id_bimbingan_laporan_akhir" value="{{ $result->id_bimbingan_laporan_akhir }}">
                </div>
                
                <div class="form-group" hidden>
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_mahasiswa_bimbingan" name="id_mahasiswa_bimbingan" value="{{ $result->id_mahasiswa_bimbingan }}">
                </div>

                <div class="form-group">
                  <label>NIM Mahasiswa</label>
                  <input type="text" class="form-control" required id="nim_mahasiswa" name="nim_mahasiswa" placeholder="Masukkan NIM Mahasiswa" value="{{ $result->nim_mahasiswa }}">
                </div>

                <div class="form-group">
                  <label>Nama Mahasiswa</label>
                  <input type="text" class="form-control" required id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa" value="{{ $result->nama_mahasiswa }}">
                </div>

                <div class="form-group">
                  <label>Bukti Fisik Deskripsi</label>
                  <input type="text" class="form-control" required id="bukti_fisik_desc" name="bukti_fisik_desc" placeholder="Masukkan Bukti Fisik Deskripsi" value="{{ $result->bukti_fisik_desc }}">
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








