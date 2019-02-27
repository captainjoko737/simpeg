@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-flag"></i> Prodi</a></li>
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
            
            {!! Form::open(array('route' => 'postProdi','files'=>true)) !!}
            <div class="box-body">

                <div class="form-group">
                  <label>Kode Prodi</label>
                  <input type="text" class="form-control" required id="kode_prodi" name="kode_prodi" placeholder="Masukkan Kode Prodi" value="">
                </div>

                <div class="form-group">
                  <label>Nama Prodi</label>
                  <input type="text" class="form-control" required id="nama_prodi" name="nama_prodi" placeholder="Masukkan Nama Prodi" value="">
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








