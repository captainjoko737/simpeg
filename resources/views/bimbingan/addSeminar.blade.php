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
            
            {!! Form::open(array('route' => 'postBimbinganSeminar','files'=>true)) !!}
            <div class="box-body">

                <div class="form-group hide">
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_user" name="id_user" value="{{ $id_user }}">
                </div>

                <div class="form-group">
                  <label>Nama Bimbingan</label>
                  <input type="text" class="form-control" required id="nama_bimbingan" name="nama_bimbingan" placeholder="Masukkan Nama Bimbingan" value="">
                </div>

                <div class="form-group">
                  <label>Periode</label>
                  <select class="form-control" id="periode" name="periode" required>
                    @foreach ($periode as $key => $value)
                        <option value="{{ $value->id_periode }}"> {{ $value->tahun }} </option>
                    @endforeach
                    
                    
                  </select>
                </div>

                <div class="form-group">
                  <label>Semester</label>
                  <select class="form-control" id="semester" name="semester">
                    <option value="0">Genap</option>
                    <option value="1">Ganjil</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Volume Kegiatan</label>
                  <input type="text" class="form-control" required id="jumlah_sks" name="jumlah_sks" placeholder="Masukkan Jumlah SKS" value="">
                </div>

                <div class="form-group has-feedback">
                      <label>Bukti Fisik</label>
                      {!! Form::file('file', array('required' => 'required')) !!}
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








