@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-chain"></i> Pengabdian</a></li>
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
            
            {!! Form::open(array('route' => 'putPelaksanaanPendidikan','files'=>true, 'method' => 'PUT')) !!}
            <div class="box-body">  

                <div class="form-group hide">
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_user" name="id_user" value="{{ $id_user }}">
                </div>

                <div class="form-group hide">
                  <label>id pelaksanaan pendidikan</label>
                  <input type="text" class="form-control" required id="id_pelaksanaan_pendidikan" name="id_pelaksanaan_pendidikan" value="{{ $result['id_pelaksanaan_pendidikan'] }}">
                </div>

                <div class="form-group">
                  <label>Nama Pelaksanaan</label>
                  <input type="text" class="form-control" required id="nama_pelaksanaan" name="nama_pelaksanaan" placeholder="Masukkan Nama Pelaksanaan" value="{{ $result['nama_pelaksanaan'] }}">
                </div>

                <div class="form-group">
                  <label>Semester</label>
                  <select class="form-control" id="semester" name="semester">
                    <option value="0">Genap</option>
                    <option value="1">Ganjil</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Jumlah SKS</label>
                  <input type="text" class="form-control" required id="jumlah_sks" name="jumlah_sks" placeholder="Masukkan Jumlah SKS" value="{{ $result['jumlah_sks'] }}">
                </div>

                <div class="form-group">
                  <label>Periode</label>
                  <input type="text" class="form-control" required id="periode" name="periode" placeholder="Masukkan Periode" value="{{ $result['periode'] }}">
                </div>

                <div class="form-group has-feedback">
                      <label>Bukti Fisik</label>
                      {!! Form::file('file') !!}
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








