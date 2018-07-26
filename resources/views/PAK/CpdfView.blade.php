<!DOCTYPE html>
<html lang="en">
<head>
  <title>BIDANG - C</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>

      #customers {
          font-family: Arial;
          border-collapse: collapse;
          width: 100%;
      }

      #customers td, #customers th {
          border: 1px solid #9e9e9e;
          padding: 8px;
          font-size: 12px;
      }

      /*#customers tr:nth-child(even){background-color: #f2f2f2;}*/

      #customers tr:hover {background-color: #ddd;}

      #customers th {
          padding-top: 5px;
          padding-bottom: 5px;
          font-size: 10px;
          text-align: left;
          background-color: #fff;
          color: black;
      }

      #nones {
          font-family: Arial;
          border-collapse: collapse;
          width: 100%;
      }

      #nones td, #nones th {
          border: 0px solid #000;
          padding: 3px;
          font-size: 12px;
      }
      /*#customers tr:nth-child(even){background-color: #f2f2f2;}*/

      #nones tr:hover {background-color: #ddd;}

      #nones th {
          padding-top: 5px;
          padding-bottom: 5px;
          font-size: 12px;
          text-align: left;
          background-color: #fff;
          color: black;
      }

      h5 {
        margin-top: -10px; 
      }
      p {
        font-size: 12px;
      }
  </style>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <script src="{{ url('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>
<body>



<div class="container">
  
  <table class="" id="nones" width="100%">
    <thead>
      <tr>
        <td style="width:50%"></td>
        <td style="width:50%">Salinan Lampiran IV <br> Peraturan Bersama Menteri Pendidikan dan Kebudayaan dan Kepala Badan Kepegawaian Negara <br> Nomor : 4/VIII/PB/2014 <br> Nomor : 24 Tahun 2014 <br> Tentang Ketentuan Pelaksanaan Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi <br> Nomor : 17 Tahun 2013 Tentang Jabatan Fungsional dan Angka Kreditnya, Sebagaimana Telah Diubah Dengan Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Republik Indonesia Nomor 46 Tahun 2013</td>
      </tr>
    </thead>
  </table>
  <br><br>
  <center><h5>SURAT PERNYATAAN</h5></center>
  <center><h5>MELAKSANAKAN PENGABDIAN PADA MASYARAKAT</h5></center>

  <p>Yang bertanda tangan di bawah ini</p>
  <table class="" id="customers" width="100%">
    <thead>
      <tr>
        <td style="width:5%; text-align:center;">1</td>
        <td style="width:25%">N a m a </td>
        <td style="width:70%">{{ $data_penanggung['nama'] }}</td>
      </tr>
      <tr>
        <td style="width:5%; text-align:center;">2</td>
        <td style="width:25%">N I P </td>
        <td style="width:70%">{{ $data_penanggung['nip'] }}</td>
      </tr>
      <tr>
        <td style="width:5%; text-align:center;">3</td>
        <td style="width:25%">Pangkat / Golongan Ruang </td>
        <td style="width:70%">{{ $data_penanggung['pangkat'] }}</td>
      </tr>
      <tr>
        <td style="width:5%; text-align:center;">4</td>
        <td style="width:25%">Jabatan Fungsional </td>
        <td style="width:70%">{{ $data_penanggung['jabatan_fungsional'] }}</td>
      </tr>
      <tr>
        <td style="width:5%; text-align:center;">5</td>
        <td style="width:25%">Unit Kerja </td>
        <td style="width:70%">{{ $data_penanggung['unit'] }}</td>
      </tr>
    </thead>
  </table>

  <p>Menyatakan bahwa</p>
  <table class="" id="customers" width="100%">
    <thead>
      <tr>
        <td style="width:5%; text-align:center;">1</td>
        <td style="width:25%">N a m a </td>
        <td style="width:70%">{{ $data_dosen->nama }}</td>
      </tr>
      <tr>
        <td style="width:5%; text-align:center;">2</td>
        <td style="width:25%">N I P </td>
        <td style="width:70%">{{ $data_dosen->nip }}</td>
      </tr>
      <tr>
        <td style="width:5%; text-align:center;">3</td>
        <td style="width:25%">Pangkat / Golongan Ruang </td>
        <td style="width:70%">{{ $data_dosen->pangkat }}</td>
      </tr>
      <tr>
        <td style="width:5%; text-align:center;">4</td>
        <td style="width:25%">Jabatan Fungsional </td>
        <td style="width:70%">{{ $data_dosen->jabatan_fungsional }}</td>
      </tr>
      <tr>
        <td style="width:5%; text-align:center;">5</td>
        <td style="width:25%">Unit Kerja </td>
        <td style="width:70%">Universitas Islam Nusantara</td>
      </tr>
    </thead>
  </table>
  
  <br>
  <p>Telah melaksanakan pengabdian pada masyarakat sebagai berikut  : </p>
  <br>
  <h5>A. Menduduki Jabatan Pimpinan</h5>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th>Tanggal</th>
      <th>Hasil <br> Satuan</th>
      <th class="text-center">Volume <br> Kegiatan</th>
      <th class="text-center">Angka <br> Kredit</th>
      <th class="text-center">Jumlah Angka Kredit</th>
      <th>Bukti Fisik</th>
    </tr>
    
    @foreach ($pengabdianA as $key => $value)
      <tr>
          <td><center>{{ ++$key }}</center></td>
          <td>{{ $value->nama_kegiatan }}</td>
          <td>{{ $value->tanggal_kegiatan }}</td>
          <td>{{ $value->satuan_hasil }}</td>
          <td class="text-center"><center>{{ $value->volume_kegiatan }}</center></td>
          <td class="text-center"><center>{{ $value->angka_kredit }}</center></td>
          <td class="text-center"><center>{{ $value->angka_kredit * $value->volume_kegiatan }}</center></td>
          <td>{{ $value->bukti_fisik_desc }}</td>
      </tr>
      
    @endforeach
    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center"><center>{{ $pengabdianACount }}</center></th>
      </tr>
  </table>

  <br><br>
  <h5>B. Melaksanakan Pengembangan Hasil Pendidikan dan Penelitian</h5>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th>Tanggal</th>
      <th>Hasil <br> Satuan</th>
      <th class="text-center">Volume <br> Kegiatan</th>
      <th class="text-center">Angka <br> Kredit</th>
      <th class="text-center">Jumlah Angka Kredit</th>
      <th>Bukti Fisik</th>
    </tr>
    
    @foreach ($pengabdianB as $key => $value)
      <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $value->nama_kegiatan }}</td>
          <td>{{ $value->tanggal_kegiatan }}</td>
          <td>{{ $value->satuan_hasil }}</td>
          <td class="text-center">{{ $value->volume_kegiatan }}</td>
          <td class="text-center">{{ $value->angka_kredit }}</td>
          <td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
          <td>{{ $value->bukti_fisik_desc }}</td>
      </tr>
      
    @endforeach
    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center">{{ $pengabdianBCount }}</th>
      </tr>
  </table>
  <br><br>

  <h5>C. Memberi Latihan / Penyuluhan / Penataran / Ceramah pada Masyarakat</h5>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th>Tanggal</th>
      <th>Hasil <br> Satuan</th>
      <th class="text-center">Volume <br> Kegiatan</th>
      <th class="text-center">Angka <br> Kredit</th>
      <th class="text-center">Jumlah Angka Kredit</th>
      <th>Bukti Fisik</th>
    </tr>
    
    @foreach ($pengabdianC as $key => $value)
      <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $value->nama_kegiatan }}</td>
          <td>{{ $value->tanggal_kegiatan }}</td>
          <td>{{ $value->satuan_hasil }}</td>
          <td class="text-center">{{ $value->volume_kegiatan }}</td>
          <td class="text-center">{{ $value->angka_kredit }}</td>
          <td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
          <td>{{ $value->bukti_fisik_desc }}</td>
      </tr>
      
    @endforeach
    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center"><center>{{ $pengabdianCCount }}</center></th>
      </tr>
  </table>
  <br><br>

  <h5>D. Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas umum </h5>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th>Tanggal</th>
      <th>Hasil <br> Satuan</th>
      <th class="text-center">Volume <br> Kegiatan</th>
      <th class="text-center">Angka <br> Kredit</th>
      <th class="text-center">Jumlah Angka Kredit</th>
      <th>Bukti Fisik</th>
    </tr>

    @foreach ($pengabdianD as $key => $value)
      <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $value->nama_kegiatan }}</td>
          <td>{{ $value->tanggal_kegiatan }}</td>
          <td>{{ $value->satuan_hasil }}</td>
          <td class="text-center">{{ $value->volume_kegiatan }}</td>
          <td class="text-center">{{ $value->angka_kredit }}</td>
          <td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
          <td>{{ $value->bukti_fisik_desc }}</td>
      </tr>
      
    @endforeach
    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center"><center>{{ $pengabdianDCount }}</center></th>
      </tr>
  </table>
  <br><br>

  <h5>E. Membuat / menulis karya pengabdian </h5>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th>Tanggal</th>
      <th>Hasil <br> Satuan</th>
      <th class="text-center">Volume <br> Kegiatan</th>
      <th class="text-center">Angka <br> Kredit</th>
      <th class="text-center">Jumlah Angka Kredit</th>
      <th>Bukti Fisik</th>
    </tr>
    
    @foreach ($pengabdianE as $key => $value)
      <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $value->nama_kegiatan }}</td>
          <td>{{ $value->tanggal_kegiatan }}</td>
          <td>{{ $value->satuan_hasil }}</td>
          <td class="text-center">{{ $value->volume_kegiatan }}</td>
          <td class="text-center">{{ $value->angka_kredit }}</td>
          <td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
          <td>{{ $value->bukti_fisik_desc }}</td>
      </tr>
      
    @endforeach
    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center"><center>{{ $pengabdianECount }}</center></th>
      </tr>
      
  </table>
<br>
  <table class="table" id="customers" width="100%">

      <tr>
      <th style="border:0px;"><strong>Jumlah Bidang C </strong></th>
      <th style="border:0px;"><center>{{ $jumlahBidangC }}</center></th>
      <hr>
      </tr>
  </table>
  <p>Demikian pernyataan ini dibuat untuk dapat dipergunakan sebagaimana mestinya </p>

  <table class="table" id="customers" width="100%">

      <tr>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center>{{ $data_penanggung['tanggal_cetak'] }}</center></th>
        
      </tr>
      <tr>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center>{{ $data_penanggung['jabatan_struktural'] }}</center></th>

      </tr>
  </table>
  <br><br><br>
  <table class="table" id="customers" width="100%">
      <br>
      <tr>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><strong></strong></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center></center></th>
        <th style="border:0px;"><center>{{ $data_penanggung['nama'] }}</center></th>

      </tr>
  </table>

</div>


           

</body>
</html>
