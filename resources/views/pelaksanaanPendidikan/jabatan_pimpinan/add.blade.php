@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-indent"></i> Jabatan Pimpinan</a></li>
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
            
            {!! Form::open(array('route' => 'postPendidikanJabatan','files'=>true)) !!}
            <div class="box-body">  

                <div class="form-group hide">
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_user" name="id_user" value="{{ $id_user }}">
                </div>

                <div class="form-group">
                  <label>Nama Kegiatan</label>
                  <input type="text" class="form-control" required id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" value="">
                </div>

                <div class="form-group">
                  <label>Tahun</label>
                  <input type="text" class="form-control" required id="tahun" name="tahun" placeholder="Masukkan Tahun" value="">
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" id="status" name="status">
                    <option value="Selesai">Selesai</option>
                    <option value="Lanjut">Lanjut</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Volume Kegiatan</label>
                  <input type="text" class="form-control" required id="volume_kegiatan" name="volume_kegiatan" placeholder="Masukkan Volume Kegiatan" value="">
                </div>

                <div class="form-group">
                  <label>Angka Kredit</label>
                  <input type="text" class="form-control" required id="angka_kredit" name="angka_kredit" placeholder="Masukkan Angka Kredit" value="">
                </div>

                <div class="form-group">
                  <label>Deskripsi Bukti Fisik</label>
                  <input type="text" class="form-control" required id="bukti_fisik_desc" name="bukti_fisik_desc" placeholder="Masukkan Deskripsi Bukti Fisik" value="">
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








