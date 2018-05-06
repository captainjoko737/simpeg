@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-book"></i> Kegiatan Mahasiswa</a></li>
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
            
            {!! Form::open(array('route' => 'putKegiatan','files'=>true, 'method' => 'PUT')) !!}
            <div class="box-body">  

                <div class="form-group" hidden>
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_user" name="id_user" value="{{ $id_user }}">
                </div>

                <div class="form-group">
                  <label>Nama Kegiatan Mahasiswa</label>
                  <input type="text" class="form-control" required id="nama" name="nama" placeholder="Masukkan Nama Kegiatan Mahasiswa" value="{{ $result->nama }}">
                </div>

                <div class="form-group" hidden>
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_kegiatan_mahasiswa" name="id_kegiatan_mahasiswa" value="{{ $result->id_kegiatan_mahasiswa }}">
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
                  <select class="form-control" id="semester" name="semester" required>
                    <option value="0">Genap</option>
                    <option value="1">Ganjil</option>
                  </select>
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
    
    var periode = '{!! $result->periode !!}';
    var semester = '{!! $result->semester !!}';
    document.getElementById("periode").value = periode;
    document.getElementById("semester").value = semester;


    
</script>

@endsection








