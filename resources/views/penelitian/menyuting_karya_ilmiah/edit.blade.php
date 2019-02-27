@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-search"></i> Penelitian</a></li>
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
            

            {!! Form::open(array('route' => 'putPenelitianC','files'=>true, 'method' => 'PUT')) !!}
            <div class="box-body">  

                <div class="form-group hide">
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_user" name="id_user" value="{{ $result->id_user }}">
                </div>

                <div class="form-group hide">
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_menyuting_karya_ilmiah" name="id_menyuting_karya_ilmiah" value="{{ $result->id_menyuting_karya_ilmiah }}">
                </div>

                <div class="form-group">
                  <label>Nama Kegiatan</label>
                  <input type="text" class="form-control" required id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" value="{{ $result->nama_kegiatan }}">
                </div>

                <div class="form-group">
                  <label>Tanggal Kegiatan</label>
                  <input type="text" class="form-control" required id="tanggal_kegiatan" name="tanggal_kegiatan" placeholder="Masukkan Tanggal Kegiatan" value="{{ $result->tanggal }}">
                </div>

                <div class="form-group">
                  <label>Satuan Hasil</label>
                  <input type="text" class="form-control" required id="satuan_hasil" name="satuan_hasil" placeholder="Masukkan Satuan Hasil" value="{{ $result->satuan_hasil }}">
                </div>

                <div class="form-group">
                  <label>Volume Kegiatan</label>
                  <input type="text" class="form-control" required id="volume_kegiatan" name="volume_kegiatan" placeholder="Masukkan Volume Kegiatan" value="{{ $result->volume_kegiatan }}">
                </div>

                <div class="form-group">
                  <label>Bukti Fisik Deskripsi</label>
                  <input type="text" class="form-control" required id="bukti_fisik_desc" name="bukti_fisik_desc" placeholder="Masukkan Bukti Fisik Deskripsi" value="{{ $result->bukti_fisik_desc }}">
                </div>

                <div class="form-group has-feedback">
                  <label>Bukti Fisik</label>
                  {!! Form::file('file', array('accept' => 'application/pdf')) !!}
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








