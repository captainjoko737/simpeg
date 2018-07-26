@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-mortar-board"></i> Dosen</a></li>
      </ol>
    </section>

        <!-- PROFILE -->

        <section class="content">
          
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pribadi</h3>
                </div>

                {!! csrf_field() !!}
                

                {!! Form::open(array('route' => 'postDosen','files'=>true)) !!}
                <div class="box-body">  

                    <div class="form-group" hidden>
                      <label>id prodi</label>
                      <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="{{ $id_prodi }}">
                    </div>

                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="" required>
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="" required>
                    </div>

                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin" value="" required>
                    </div>

                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="" required>
                    </div>

                    <div class="form-group">
                      <label>Tanggal Lahir (TTTT-BB-HH)</label>
                      <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="" required>
                    </div>

                    <div class="form-group">
                      <label>Agama</label>
                      <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukkan agama" value="" required>
                    </div>

                    <div class="form-group">
                      <label>Kewarganegaraan</label>
                      <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="Masukkan kewarganegaraan" value="" required>
                    </div>

                    <div class="form-group has-feedback">
                      <label>Photo Profile</label>
                      {!! Form::file('image_file', array()) !!}
                    </div>
  
                </div>
                
              </div>
            </div>
          </div>
          
        </section>

        <!-- KEPEGAWAIAN -->

        <section class="content">
          
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">KEPEGAWAIAN</h3>
                </div>
                
                <div class="box-body">  

                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="">
                    </div>

                    <div class="form-group">
                      <label>NIDN</label>
                      <input type="text" class="form-control" id="nidn" name="nidn" placeholder="Masukkan NIDN" value="">
                    </div>

                    <div class="form-group">
                      <label>Nomor SK CPNS</label>
                      <input type="text" class="form-control" id="nomor_sk_cpns" name="nomor_sk_cpns" placeholder="Masukkan Nomor SK CPNS" value="">
                    </div>

                    <div class="form-group">
                      <label>SK CPNS Terhitung Mulai Tanggal</label>
                      <input type="text" class="form-control" id="sk_cpns_terhitung_mulai_tanggal" name="sk_cpns_terhitung_mulai_tanggal" placeholder="SK CPNS Terhitung Mulai Tanggal" value="">
                    </div>

                    <div class="form-group">
                      <label>Nomor SK PNS</label>
                      <input type="text" class="form-control" id="nomor_sk_pns" name="nomor_sk_pns" placeholder="Masukkan Nomor SK PNS" value="">
                    </div>

                    <div class="form-group">
                      <label>Tanggal Menjadi PNS</label>
                      <input type="text" class="form-control" id="tanggal_menjadi_pns" name="tanggal_menjadi_pns" placeholder="Tanggal Menjadi PNS" value="">
                    </div>

                    <div class="form-group">
                      <label>Sumber Gaji</label>
                      <input type="text" class="form-control" id="sumber_gaji" name="sumber_gaji" placeholder="Sumber Gaji" value="">
                    </div>

                </div>
                
              </div>
            </div>
          </div>
          
        </section>

        <!-- ALAMAT KONTAK -->

        <section class="content">
          
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">ALAMAT KONTAK</h3>
                </div>

                <div class="box-body">  

                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="">
                    </div>

                    <div class="form-group">
                      <label>Nomor SK CPNS</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" value="">
                    </div>

                    <div class="form-group">
                      <label>RT</label>
                      <input type="text" class="form-control" id="rt" name="rt" placeholder="Masukkan RT" value="">
                    </div>

                    <div class="form-group">
                      <label>RW</label>
                      <input type="text" class="form-control" id="rw" name="rw" placeholder="Masukkan RW" value="">
                    </div>

                    <div class="form-group">
                      <label>Dusun</label>
                      <input type="text" class="form-control" id="dusun" name="dusun" placeholder="Masukkan Dusun" value="">
                    </div>



                    <div class="form-group">
                      <label>Desa / Kabupaten</label>
                      <input type="text" class="form-control" id="desa_kabupaten" name="desa_kabupaten" placeholder="Masukkan Desa / Kabupaten" value="">
                    </div>

                    <div class="form-group">
                      <label>Kota / Kabupaten</label>
                      <input type="text" class="form-control" id="kota_kabupaten" name="kota_kabupaten" placeholder="Masukkan Dusun" value="">
                    </div>

                    <div class="form-group">
                      <label>Provinsi</label>
                      <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Masukkan Provinsi" value="">
                    </div>

                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Masukkan Kode Pos" value="">
                    </div>

                    <div class="form-group">
                      <label>Nomor Tlp Rumah</label>
                      <input type="text" class="form-control" id="no_telepon_rumah" name="no_telepon_rumah" placeholder="Masukkan Nomor Tlp Rumah" value="">
                    </div>

                    <div class="form-group">
                      <label>Nomor HP</label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP" value="">
                    </div>

                </div>
                
              </div>
            </div>
          </div>
          
        </section>

        <!-- KELUARGA -->

        <section class="content">
          
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">KELUARGA</h3>
                </div>
                
                <div class="box-body">  

                    <div class="form-group">
                      <label>Nama Ibu Kandung</label>
                      <input type="text" class="form-control" id="nama_ibu_kandung" name="nama_ibu_kandung" placeholder="Masukkan Nama Ibu Kandung" value="">
                    </div>

                    <div class="form-group">
                      <label>Status Perkawinan</label>
                      <input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan" placeholder="Masukkan Status Perkawinan" value="">
                    </div>

                    <div class="form-group">
                      <label>Nama Suami / Istri</label>
                      <input type="text" class="form-control" id="nama_suami_istri" name="nama_suami_istri" placeholder="Masukkan Nama Suami / Istri" value="">
                    </div>

                    <div class="form-group">
                      <label>NIP Suami / Istri</label>
                      <input type="text" class="form-control" id="nip_suami_istri" name="nip_suami_istri" placeholder="Masukkan NIP Suami / Istri" value="">
                    </div>

                    <div class="form-group">
                      <label>Pekerjaan Suami / Istri</label>
                      <input type="text" class="form-control" id="pekerjaan_suami_istri" name="pekerjaan_suami_istri" placeholder="Masukkan Pekerjaan Suami / Istri" value="">
                    </div>



                    <div class="form-group">
                      <label>Terhitung Mulai Tanggal PNS Suami / Istri</label>
                      <input type="text" class="form-control" id="terhitung_mulai_tanggal_pns_suami_istri" name="terhitung_mulai_tanggal_pns_suami_istri" placeholder="Masukkan Tanggal PNS Suami / Istri" value="">
                    </div>

                </div>
                
              </div>
            </div>
          </div>
          
        </section>

        <!-- LAIN - LAIN -->

        <section class="content">
          
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Lain - Lain</h3>
                </div>
               
                <div class="box-body">  

                    <div class="form-group">
                      <label>NPWP</label>
                      <input type="text" class="form-control" id="npwp" name="npwp" placeholder="Masukkan NPWP" value="">
                    </div>

                    <div class="form-group">
                      <label>Nama Wajib Pajak</label>
                      <input type="text" class="form-control" id="nama_wajib_pajak" name="nama_wajib_pajak" placeholder="Masukkan Nama Wajib Pajak" value="">
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
  
  function edit(id_user, id_edit) {
    

    location.href='edit/'+ id_user +'/1';
  }
  
</script>

@endsection