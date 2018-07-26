@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-user"></i> Admin Prodi</a></li>
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
            
            {!! Form::open(array('route' => 'postAdminProdi','files'=>true)) !!}
            <div class="box-body">

                <div class="form-group">
                  <label for="sel1">Pilih Prodi</label>
                  <select class="form-control" id="id_prodi" name="id_prodi" required>
                    
                    <option value="">- Pilih Prodi -</option>
                    @foreach ($prodi as $key => $value)
                      <option value="{{ $value->id_prodi }}">{{ $value->nama_prodi }}</option>
                    @endforeach
                  </select>
                </div> 

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" required id="username" name="username" placeholder="Masukkan Username" value="">
                </div>

                <div class="form-group">
                  <label>password</label>
                  <input type="password" class="form-control" required id="password" name="password" placeholder="Masukkan Password" value="">
                </div>

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" required id="nama" name="nama" value="" placeholder="Masukkan Nama Lengkap">
                </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <input type="text" class="form-control" required id="jenis_kelamin" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin" value="">
                </div>

                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" required id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="">
                </div>

                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="text" class="form-control" required id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="">
                </div>

                <div class="form-group">
                  <label>Agama</label>
                  <input type="text" class="form-control" required id="agama" name="agama" placeholder="Masukkan Agama" value="">
                </div>

                <div class="form-group">
                  <label>Kewarganegaraan</label>
                  <input type="text" class="form-control" required id="kewarganegaraan" name="kewarganegaraan" placeholder="Masukkan Kewarganegaraan" value="">
                </div>

                <div class="form-group" hidden>
                  <label>is Admin</label>
                  <input type="text" class="form-control" required id="is_admin" name="is_admin" placeholder="Masukkan Tanggal Lahir" value="1">
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








