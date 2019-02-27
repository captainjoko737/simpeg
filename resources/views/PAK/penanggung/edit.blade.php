@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-chain"></i> Layanan PAK</a></li>
      </ol>
    </section>

    <!-- PROFILE -->

    <section class="content">
      
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>

            {!! csrf_field() !!}
            

            {!! Form::open(array('route' => 'putPenanggung','files'=>true, 'method' => 'PUT')) !!}
            <div class="box-body">  

                <div class="form-group row">
                  <div class="col-xs-4">
                    <label for="nama">Nama : </label>
                    <input class="form-control" id="nama" name="nama" type="text" value="{{$penanggung->nama}}">
                  </div>
                  <div class="col-xs-4">
                    <label for="nip">NIP : </label>
                    <input class="form-control" id="nip" name="nip" type="text" value="{{$penanggung->nip}}">
                  </div>
                  <div class="col-xs-4">
                    <label for="pangkat">Pangkat / Golongan Ruang  : </label>
                    <input class="form-control" id="pangkat" name="pangkat" type="text" value="{{$penanggung->pangkat}}">
                  </div>
                </div> 
                <div class="form-group row">
                  <div class="col-xs-4">
                    <label for="jp">Jabatan Fungsional : </label>
                    <input class="form-control" id="jabatan_fungsional" name="jabatan_fungsional" type="text" value="{{$penanggung->jabatan_fungsional}}">
                  </div>
                  <div class="col-xs-4">
                    <label for="jp">Jabatan Struktural : </label>
                    <input class="form-control" id="jabatan_struktural" name="jabatan_struktural" type="text" value="{{$penanggung->jabatan_struktural}}">
                  </div>
                  <div class="col-xs-4">
                    <label for="unit">Unit Kerja : </label>
                    <input class="form-control" id="unit_kerja" name="unit_kerja" type="text" value="{{$penanggung->unit_kerja}}">
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-xs-2">
                    <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-warning btn-block btn-flat">Kembali</button>
                  </div>
                  <div class="col-xs-2">
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








