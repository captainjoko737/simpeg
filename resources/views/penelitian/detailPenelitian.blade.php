@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-archive"></i> Penelitian</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $penelitian['judul_kegiatan']}}</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  

                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-striped">
               
                <tr>
                  <td style="width: 30%"><strong>Judul Penelitian</strong></td>
                  <td style="width: 50%">{{ $penelitian['judul_kegiatan'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Kategori Kegiatan</strong></td>
                  <td style="width: 50%">{{ $penelitian['kategori_kegiatan'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Lembaga IPTEK</strong></td>
                  <td style="width: 50%">{{ $penelitian['lembaga_iptek'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Kelompok Bidang</strong></td>
                  <td style="width: 50%">{{ $penelitian['kelompok_bidang'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Jenis SKIM</strong></td>
                  <td style="width: 50%">{{ $penelitian['jenis_skim'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Lokasi Kegiatan</strong></td>
                  <td style="width: 50%">{{ $penelitian['lokasi_kegiatan'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Tahun Usulan</strong></td>
                  <td style="width: 50%">{{ $penelitian['tahun_usulan'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Tahun Kegiatan</strong></td>
                  <td style="width: 50%">{{ $penelitian['tahun_kegiatan'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Tahun Pelaksanaan</strong></td>
                  <td style="width: 50%">{{ $penelitian['tahun_pelaksanaan'] }}</td>   
                </tr>

                <tr>
                  <td style="width: 30%"><strong>Lama Kegiatan</strong></td>
                  <td style="width: 50%">{{ $penelitian['lama_kegiatan'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Tahun Pelaksanaan Ke</strong></td>
                  <td style="width: 50%">{{ $penelitian['tahun_pelaksanaan_ke'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Dana dari DIKTI</strong></td>
                  <td style="width: 50%">{{ $penelitian['dana_dari_dikti'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Dana dari Perguruan Tinggi</strong></td>
                  <td style="width: 50%">{{ $penelitian['dana_dari_perguruan_tinggi'] }}</td>   
                </tr>

                <tr>
                  <td style="width: 30%"><strong>Dana dari Institusi Lain</strong></td>
                  <td style="width: 50%">{{ $penelitian['dana_dari_institusi_lain'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>In Kind</strong></td>
                  <td style="width: 50%">{{ $penelitian['in_kind'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Nomor SK Penugasan</strong></td>
                  <td style="width: 50%">{{ $penelitian['nomor_sk_penugasan'] }}</td>   
                </tr>
                <tr>
                  <td style="width: 30%"><strong>Tanggal SK Penugasan</strong></td>
                  <td style="width: 50%">{{ $penelitian['tanggal_sk_penugasan'] }}</td>   
                </tr>
      
              </table>

              <!-- /.box-body -->
            <div class="box-footer clearfix">
              <button class="btn btn-sm btn-info" onclick="back()"><i class="fa fa-chevron-left"> </i> Kembali</button>
            </div>       
                    
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      
    </section>

@endsection

@section('js')

<script type="text/javascript">
  
  function detail(id_penelitian) {
    console.log(id_penelitian);

    location.href='detailPenelitian/'+id_penelitian;
  }

  function back() {
    location.href='/penelitian/penelitian';
  }
  
</script>

@endsection




























