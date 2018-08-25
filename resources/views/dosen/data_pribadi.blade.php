@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Profile</strong></h3>
              <div class="box-tools">
                <!-- <button class="btn btn-sm btn-success" onclick="edit({{ $profile['id_user'] }}, 1)"><i class="fa fa-edit"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ url('assets/photo_profile/').'/'.$profile->photo }}" style="width:30%" >
              </div>

              <table class="table table-bordered table-striped">
               
                <tr>
                  <td style="width: 30%"><strong>Username</strong></td>
                  <td style="width: 50%">{{ $profile['username'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Jenis Kelamin</strong></td>
                  <td style="width: 50%">{{ $profile['jenis_kelamin'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Tempat Lahir</strong></td>
                  <td style="width: 50%">{{ $profile['tempat_lahir'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Tanggal Lahir</strong></td>
                  <td style="width: 50%">{{ $profile['tanggal_lahir'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Agama</strong></td>
                  <td style="width: 50%">{{ $profile['agama'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Kewarganegaraan</strong></td>
                  <td style="width: 50%">{{ $profile['kewarganegaraan'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Prodi</strong></td>
                  <td style="width: 50%">{{ $prodi->kode_prodi }} / {{ $prodi->nama_prodi }}</td>   
                </tr>

                @foreach ($pendidikan_formal as $key => $value)
                  <tr>
                    @if($key == 0)
                      <td style="width: 30%"><strong>Pendidikan Terakhir</strong></td>
                    @else
                      <td style="width: 30%"><strong></strong></td>
                    @endif
                    
                    <td style="width: 50%">{{ $value->jenjang_studi }} / {{ $value->gelar_akademik }}</td>   
                  </tr>
                @endforeach

      
              </table>
            </div>
            
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><strong>Kepegawaian</strong></h3>
              <div class="box-tools">
                <!-- <button class="btn btn-sm btn-success" onclick="edit({{ $profile['id_user'] }}, 2)"><i class="fa fa-edit"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-bordered table-striped">
                <tr>
                  <td style="width: 30%"><strong>NIP</strong></td>
                  <td style="width: 50%">{{ $profile['nip'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>NIDN</strong></td>
                  <td style="width: 50%">{{ $profile['nidn'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Nomor SK CPNS</strong></td>
                  <td style="width: 50%">{{ $profile['nomor_sk_cpns'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 40%"><strong>SK CPNS Terhitung Mulai Tanggal</strong></td>
                  <td style="width: 50%">{{ $profile['sk_cpns_terhitung_mulai_tanggal'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Nomor SK PNS</strong></td>
                  <td style="width: 50%">{{ $profile['nomor_sk_pns'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Tanggal Menjadi PNS</strong></td>
                  <td style="width: 50%">{{ $profile['tanggal_menjadi_pns'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Sumber Gaji</strong></td>
                  <td style="width: 50%">{{ $profile['sumber_gaji'] }}</td>   
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><strong>Alamat Kontak</strong></h3>

              <div class="box-tools">
                <!-- <button class="btn btn-sm btn-success" onclick="edit({{ $profile['id_user'] }}, 3)"><i class="fa fa-edit"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <td style="width: 30%"><strong>Email</strong></td>
                  <td style="width: 50%">{{ $profile['email'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Alamat</strong></td>
                  <td style="width: 50%">{{ $profile['alamat'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>RT</strong></td>
                  <td style="width: 50%">{{ $profile['rt'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>RW</strong></td>
                  <td style="width: 50%">{{ $profile['rw'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Dusun</strong></td>
                  <td style="width: 50%">{{ $profile['dusun'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Desa Kabupaten</strong></td>
                  <td style="width: 50%">{{ $profile['desa_kabupaten'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Kota / Kabupaten</strong></td>
                  <td style="width: 50%">{{ $profile['kota_kabupaten'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Provinsi</strong></td>
                  <td style="width: 50%">{{ $profile['provinsi'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Kode Pos</strong></td>
                  <td style="width: 50%">{{ $profile['kode_pos'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>No Telepon Rumah</strong></td>
                  <td style="width: 50%">{{ $profile['no_telepon_rumah'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>No HP</strong></td>
                  <td style="width: 50%">{{ $profile['no_hp'] }}</td>   
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><strong>Keluarga</strong></h3>
              <div class="box-tools">
                <!-- <button class="btn btn-sm btn-success" onclick="edit({{ $profile['id_user'] }}, 4)"><i class="fa fa-edit"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <td style="width: 30%"><strong>Nama Ibu Kandung</strong></td>
                  <td style="width: 50%">{{ $profile['nama_ibu_kandung'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Status Perkawinan</strong></td>
                  <td style="width: 50%">{{ $profile['status_perkawinan'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Nama Suami / Istri</strong></td>
                  <td style="width: 50%">{{ $profile['nama_suami_istri'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>NIP Suami / Istri</strong></td>
                  <td style="width: 50%">{{ $profile['nip_suami_istri'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Pekerjaan Suami / Istri</strong></td>
                  <td style="width: 50%">{{ $profile['pekerjaan_suami_istri'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Terhitung Mulai Tanggal PNS Suami / Istri</strong></td>
                  <td style="width: 50%">{{ $profile['terhitung_mulai_tanggal_pns_suami_istri'] }}</td>   
                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><strong>Lain-lain</strong></h3>
              <div class="box-tools">
                <!-- <button class="btn btn-sm btn-success" onclick="edit({{ $profile['id_user'] }}, 5)"><i class="fa fa-edit"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <td style="width: 30%"><strong>NPWP</strong></td>
                  <td style="width: 50%">{{ $profile['npwp'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Nama Wajib Pajak</strong></td>
                  <td style="width: 50%">{{ $profile['nama_wajib_pajak'] }}</td>   
                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>
@endsection

@section('js')

<script type="text/javascript">
  
  function edit(id_user, id_edit) {
    

    location.href='edit/'+ id_user +'/'+id_edit;
  }
  
</script>

@endsection