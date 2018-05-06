@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-book"></i> Program Kuliah</a></li>
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
            
            {!! Form::open(array('route' => 'putBahanPengajaran','files'=>true, 'method' => 'PUT')) !!}
            <div class="box-body">  

                <div class="form-group" hidden>
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_user" name="id_user" value="{{ $id_user }}">
                </div>

                <div class="form-group" hidden>
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_bahan_pengajaran" name="id_bahan_pengajaran" value="{{ $result->id_bahan_pengajaran }}">
                </div>

                <div class="form-group">
                  <label>Nama Bahan Pengajaran</label>
                  <input type="text" class="form-control" required id="nama" name="nama" placeholder="Masukkan Nama Kegiatan Mahasiswa" value="{{ $result->nama }}">
                </div>

                <div class="form-group">
                  <label>Tahun</label>
                  <input type="text" class="form-control" required id="tahun" name="tahun" placeholder="Masukkan Tahun" value="{{ $result->tahun }}">
                </div>

                <div class="form-group">
                  <label>Volume Kegiatan</label>
                  <input type="text" class="form-control" required id="tahun" name="volume_kegiatan" placeholder="Masukkan Volume Kegiatan" value="{{ $result->volume_kegiatan }}">
                </div>

                <div class="form-group">
                  <label>Bukti Fisik Deskripsi</label>
                  <input type="text" class="form-control" id="bukti_fisik_desc" name="bukti_fisik_desc" placeholder="Masukkan Bukti Fisik Deskripsi" value="{{ $result->bukti_fisik_desc }}">
                </div>

                <div class="form-group has-feedback">
                  <label>Bukti Fisik</label>
                  {!! Form::file('file', array('accept' => 'application/pdf')) !!}
                </div>

                <div class="row">
                  <div class="col-xs-4">
                    <button type="button" onclick="window.history.go(-1); return false; location.reload();" class="btn btn-warning btn-block btn-flat">Kembali</button>
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








