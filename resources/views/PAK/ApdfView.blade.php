<!DOCTYPE html>
<html lang="en">
<head>
  <title>BIDANG - A</title>
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
  <script src="{{ url('/public/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ url('/public/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
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
  <center><h5>MELAKSANAKAN KEGIATAN PENDIDIKAN DAN PENGAJARAN</h5></center>

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
        <td style="width:25%">N I P / NIDN</td>
        <td style="width:70%">{{ $data_dosen->nip }} / {{ $data_dosen->nidn }}</td>
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
  <p>Telah melaksanakan pendidikan sebagai berikut  :</p>
  <br>
  <h5>I. PENDIDIKAN </h5>
  <p><strong>A. Pendidikan Formal</strong></h5>
  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th><center>Tanggal</center></th>
      <th><center>Hasil <br> Satuan</center></th>
      <th class="text-center"><center>Volume <br> Kegiatan</center></th>
      <th class="text-center"><center>Angka <br> Kredit</center></th>
      <th class="text-center"><center>Jumlah Angka Kredit</center></th>
      <th>Bukti Fisik</th>
    </tr>
    
    @foreach ($pendidikanFormal as $key => $value)
      <tr>
          <td><center>{{ ++$key }}</center></td>
          <td>{{ $value->jenjang_studi }} ({{ $value->gelar_akademik }})</td>
          <td>{{ $value->tanggal_kelulusan }}</td>
          <td>Ijazah</td>
          <td class="text-center"><center>-</center></td>
          <td class="text-center"><center>-</center></td>
          <td class="text-center"><center>-</center></td>
          <td>-</td>
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
      <th class="text-center"><center>-</center></th>
      </tr>
  </table>
  <hr>
  <br><br><br><br><br><br>

  <h5>II. PELAKSANAAN PENDIDIKAN </h5>
  <p><strong>A. Melaksanakan Perkuliahan / tutorial membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, <br> praktek keguruan bengkel / studio / kebun percobaan / teknologi pengajaran dan praktek lapangan</strong></p>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th><center>Tanggal</center></th>
      <th><center>Hasil <br> Satuan</center></th>
      <th class="text-center"><center>Volume <br> Kegiatan</center></th>
      <th class="text-center"><center>Angka <br> Kredit</center></th>
      <th class="text-center"><center>Jumlah Angka Kredit</center></th>
      <th>Bukti Fisik</th>
    </tr>
    <tr>
      <th><center>1</center></th>
      <th>Semester Ganjil :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($pelaksPendidikan as $key => $value)
      @if($value->semester == 1)
          <tr>
            <td></td>
            <td>({{ ++$key }}) {{ $value->nama_pelaksanaan }}</td>
            <td>{{ $value->periode }}</td>
            <td><center>SKS</center></td>
            <td><center>{{ $value->jumlah_sks }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->bukti_fisik_desc }}</center></td>
        </tr>
      @endif
      
    @endforeach

    <tr>
      <th><center>2</center></th>
      <th>Semester Genap :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($pelaksPendidikan as $key => $value)
      @if($value->semester == 0)
          <tr>
            <td></td>
            <td>({{ ++$key }}) {{ $value->nama_pelaksanaan }}</td>
            <td>{{ $value->periode }}</td>
            <td><center>SKS</center></td>
            <td><center>{{ $value->jumlah_sks }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->bukti_fisik_desc }}</center></td>
        </tr>
      @endif
      
    @endforeach

    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center"><center>{{ $pelaksPendidikanCount }}</center></th>
      </tr>
  </table>

  <p><strong>B. Membimbing Seminar</strong></p>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th><center>Tanggal</center></th>
      <th><center>Hasil <br> Satuan</center></th>
      <th class="text-center"><center>Volume <br> Kegiatan</center></th>
      <th class="text-center"><center>Angka <br> Kredit</center></th>
      <th class="text-center"><center>Jumlah Angka Kredit</center></th>
      <th>Bukti Fisik</th>
    </tr>
    <tr>
      <th><center>1</center></th>
      <th>Semester Ganjil :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($bimbinganSeminar as $key => $value)
      @if($value->semester == 1)
          <tr>
            <td></td>
            <td>({{ ++$key }}) {{ $value->nama_bimbingan }}</td>
            <td>{{ $value->tahun }}</td>
            <td><center>SKS</center></td>
            <td><center>{{ $value->jumlah_sks }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->bukti_fisik_desc }}</center></td>
        </tr>
      @endif
      
    @endforeach

    <tr>
      <th><center>2</center></th>
      <th>Semester Genap :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($bimbinganSeminar as $key => $value)
      @if($value->semester == 0)
          <tr>
            <td></td>
            <td>({{ ++$key }}) {{ $value->nama_bimbingan }}</td>
            <td>{{ $value->tahun }}</td>
            <td><center>SKS</center></td>
            <td><center>{{ $value->jumlah_sks }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->bukti_fisik_desc }}</center></td>
        </tr>
      @endif
      
    @endforeach

    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center"><center>{{ $bimbinganSeminarCount }}</center></th>
      </tr>
  </table>

  <p><strong>C. Membimbing kuliah kerja nyata, praktek kerja nyata, praktek kerja lapangan</strong></p>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th><center>Tanggal</center></th>
      <th><center>Hasil <br> Satuan</center></th>
      <th class="text-center"><center>Volume <br> Kegiatan</center></th>
      <th class="text-center"><center>Angka <br> Kredit</center></th>
      <th class="text-center"><center>Jumlah Angka Kredit</center></th>
      <th>Bukti Fisik</th>
    </tr>
    <tr>
      <th><center>1</center></th>
      <th>Semester Ganjil :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($bimbinganKkp as $key => $value)
      @if($value->semester == 1)
          <tr>
            <td></td>
            <td>({{ ++$key }}) {{ $value->nama_bimbingan }}</td>
            <td>{{ $value->tahun }}</td>
            <td><center>SKS</center></td>
            <td><center>{{ $value->jumlah_sks }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->bukti_fisik_desc }}</center></td>
        </tr>
      @endif
      
    @endforeach

    <tr>
      <th><center>2</center></th>
      <th>Semester Genap :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($bimbinganKkp as $key => $value)
      @if($value->semester == 0)
          <tr>
            <td></td>
            <td>({{ ++$key }}) {{ $value->nama_bimbingan }}</td>
            <td>{{ $value->tahun }}</td>
            <td><center>SKS</center></td>
            <td><center>{{ $value->jumlah_sks }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->angka_kredit }}</center></td>
            <td><center>{{ $value->bukti_fisik_desc }}</center></td>
        </tr>
      @endif
      
    @endforeach

    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center"><center>{{ $bimbinganKkpCount }}</center></th>
      </tr>
  </table>

  <p><strong>D. Membimbing dan ikut membimbing dalam menghasilkan disertasi, thesis, skripsi dan laporan akhir studi</strong></p>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th><center>Tanggal</center></th>
      <th><center>Hasil <br> Satuan</center></th>
      <th class="text-center"><center>Volume <br> Kegiatan</center></th>
      <th class="text-center"><center>Angka <br> Kredit</center></th>
      <th class="text-center"><center>Jumlah Angka Kredit</center></th>
      <th>Bukti Fisik</th>
    </tr>
    <tr>
      <th><center>1</center></th>
      <th>Semester Ganjil :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($bimbinganLaporanAkhir as $key => $value)
      @if($value->semester == 1)
          <tr>
            <td><strong></strong></td>
            <td><strong>{{ $value->jenis_bimbingan }} {{ count($value->mahasiswa) }} orang mahasiswa</strong></td>
            <td><strong>{{ $value->tahun }}</strong></td>
            <td><strong>{{ $value->status }}</strong></td>
            <td class="text-center"><strong><center>-</center></strong></td>
            <td class="text-center"><strong><center>{{ count($value->mahasiswa) }}</center></strong></td>
            <td class="text-center"><strong><center>{{ $value->jumlah }}</strong></center></td>
            <td><strong><center>-</center></strong></td>
        </tr>

        @foreach ($value->mahasiswa as $keys => $values) 
          <tr>
              <td></td>
              <td>{{ $values->nama_mahasiswa }}</td>
              <td>{{ $values->nim_mahasiswa }}</td>
              <td>{{ $values->bukti_fisik_desc }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
          </tr>
        @endforeach
      @endif
    @endforeach

    <tr>
      <th><center>2</center></th>
      <th>Semester Genap :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($bimbinganLaporanAkhir as $key => $value)
      @if($value->semester == 0)
          <tr>
            <td><strong></strong></td>
            <td><strong>{{ $value->jenis_bimbingan }} {{ count($value->mahasiswa) }} orang mahasiswa</strong></td>
            <td><strong>{{ $value->tahun }}</strong></td>
            <td><strong>{{ $value->status }}</strong></td>
            <td class="text-center"><strong><center>-</center></strong></td>
            <td class="text-center"><strong><center>{{ count($value->mahasiswa) }}</center></strong></td>
            <td class="text-center"><strong><center>{{ $value->jumlah }}</strong></center></td>
            <td><strong><center>-</center></strong></td>
        </tr>

        @foreach ($value->mahasiswa as $keys => $values) 
          <tr>
              <td></td>
              <td>{{ $values->nama_mahasiswa }}</td>
              <td>{{ $values->nim_mahasiswa }}</td>
              <td>{{ $values->bukti_fisik_desc }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
          </tr>
        @endforeach
      @endif
    @endforeach

    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center"><center>{{ $bimbinganLaporanAkhirCount }}</center></th>
      </tr>
  </table>

  <p><strong>E. Bertugas sebagai penguji pada ujian akhir</strong></p>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th><center>Tanggal</center></th>
      <th><center>Hasil <br> Satuan</center></th>
      <th class="text-center"><center>Volume <br> Kegiatan</center></th>
      <th class="text-center"><center>Angka <br> Kredit</center></th>
      <th class="text-center"><center>Jumlah Angka Kredit</center></th>
      <th>Bukti Fisik</th>
    </tr>
    <tr>
      <th><center>1</center></th>
      <th>Semester Ganjil :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($penguji as $key => $value)
      @if($value->semester == 1)
          <tr>
            <td><strong></strong></td>
            <td><strong>Penguji Ujian Akhir {{ count($value->mahasiswa) }} orang mahasiswa</strong></td>
            <td><strong>{{ $value->tahun }}</strong></td>
            <td><strong>-</strong></td>
            <td class="text-center"><strong><center>-</center></strong></td>
            <td class="text-center"><strong><center>{{ count($value->mahasiswa) }}</center></strong></td>
            <td class="text-center"><strong><center>{{ $value->jumlah }}</strong></center></td>
            <td><strong><center>-</center></strong></td>
        </tr>

        @foreach ($value->mahasiswa as $keys => $values) 
          <tr>
              <td></td>
              <td>{{ $values->nama_mahasiswa }}</td>
              <td>{{ $values->nim_mahasiswa }}</td>
              <td>{{ $values->bukti_fisik_desc }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
          </tr>
        @endforeach
      @endif
    @endforeach

    <tr>
      <th><center>2</center></th>
      <th>Semester Genap :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($penguji as $key => $value)
      @if($value->semester == 0)
          <tr>
            <td><strong></strong></td>
            <td><strong>Penguji Ujian Akhir {{ count($value->mahasiswa) }} orang mahasiswa</strong></td>
            <td><strong>{{ $value->tahun }}</strong></td>
            <td><strong>-</strong></td>
            <td class="text-center"><strong><center>-</center></strong></td>
            <td class="text-center"><strong><center>{{ count($value->mahasiswa) }}</center></strong></td>
            <td class="text-center"><strong><center>{{ $value->jumlah }}</strong></center></td>
            <td><strong><center>-</center></strong></td>
        </tr>

        @foreach ($value->mahasiswa as $keys => $values) 
          <tr>
              <td></td>
              <td>{{ $values->nama_mahasiswa }}</td>
              <td>{{ $values->nim_mahasiswa }}</td>
              <td>{{ $values->bukti_fisik_desc }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
          </tr>
        @endforeach
      @endif
    @endforeach

    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center"><center>{{ $pengujiCount }}</center></th>
      </tr>
  </table>

  <p><strong>F. Membina kegiatan mahasiswa</strong></p>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th><center>Tanggal</center></th>
      <th><center>Hasil <br> Satuan</center></th>
      <th class="text-center"><center>Volume <br> Kegiatan</center></th>
      <th class="text-center"><center>Angka <br> Kredit</center></th>
      <th class="text-center"><center>Jumlah Angka Kredit</center></th>
      <th>Bukti Fisik</th>
    </tr>
    <tr>
      <th><center>1</center></th>
      <th>Semester Ganjil :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($kegiatanMahasiswa as $key => $value)
      @if($value->semester == 1)
          <tr>
            <td></td>
            <td>({{ ++$key }}) {{ $value->nama }}</td>
            <td>{{ $value->tahun }}</td>
            <td><center>SKS</center></td>
            <td><center>-</center></td>
            <td><center>{{ $value->volume_kegiatan }}</center></td>
            <td><center>{{ $value->volume_kegiatan }}</center></td>
            <td><center>{{ $value->bukti_fisik_desc }}</center></td>
        </tr>
      @endif
      
    @endforeach

    <tr>
      <th><center>2</center></th>
      <th>Semester Genap :</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><strong></strong></th>
      <th><center></center></th>
    </tr>

    @foreach ($kegiatanMahasiswa as $key => $value)
      @if($value->semester == 0)
          <tr>
            <td></td>
            <td>({{ ++$key }}) {{ $value->nama }}</td>
            <td>{{ $value->tahun }}</td>
            <td><center>SKS</center></td>
            <td><center>-</center></td>
            <td><center>{{ $value->volume_kegiatan }}</center></td>
            <td><center>{{ $value->volume_kegiatan }}</center></td>
            <td><center>{{ $value->bukti_fisik_desc }}</center></td>
        </tr>
      @endif
      
    @endforeach

    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center"><center>{{ $kegiatanMahasiswaCount }}</center></th>
      </tr>
  </table>

  <p><strong>G. Mengembangkan program kuliah</strong></p>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th><center>Tanggal</center></th>
      <th><center>Hasil <br> Satuan</center></th>
      <th class="text-center"><center>Volume <br> Kegiatan</center></th>
      <th class="text-center"><center>Angka <br> Kredit</center></th>
      <th class="text-center"><center>Jumlah Angka Kredit</center></th>
      <th>Bukti Fisik</th>
    </tr>

    @foreach ($programKuliah as $key => $value)
        <tr>
          <td><center>{{ ++$key }}</center></td>
          <td>{{ $value->nama }}</td>
          <td>{{ $value->tahun }}</td>
          <td><center>-</center></td>
          <td><center>{{ $value->volume_kegiatan }}</center></td>
          <td><center>{{ $value->volume_kegiatan }}</center></td>
          <td><center>2</center></td>
          <td><center>{{ $value->bukti_fisik_desc }}</center></td>
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
      <th class="text-center"><center>{{ $programKuliahCount }}</center></th>
      </tr>
  </table>

  <p><strong>H. Mengembangkan bahan pengajaran</strong></p>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th><center>Tanggal</center></th>
      <th><center>Hasil <br> Satuan</center></th>
      <th class="text-center"><center>Volume <br> Kegiatan</center></th>
      <th class="text-center"><center>Angka <br> Kredit</center></th>
      <th class="text-center"><center>Jumlah Angka Kredit</center></th>
      <th>Bukti Fisik</th>
    </tr>

    @foreach ($bahanPengajaran as $key => $value)
        <tr>
          <td><center>{{ ++$key }}</center></td>
          <td>{{ $value->nama }}</td>
          <td>{{ $value->tahun }}</td>
          <td><center>-</center></td>
          <td><center>{{ $value->volume_kegiatan }}</center></td>
          <td><center>5</center></td>
          <td><center>{{ $value->volume_kegiatan * 5}} </center></td>
          <td><center>{{ $value->bukti_fisik_desc }}</center></td>
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
      <th class="text-center"><center>{{ $bahanPengajaranCount }}</center></th>
      </tr>
  </table>







  <p><strong>J. Menduduki jabatan pimpinan perguruan tinggi </strong></p>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th><center>Tanggal</center></th>
      <th><center>Hasil <br> Satuan</center></th>
      <th class="text-center"><center>Volume <br> Kegiatan</center></th>
      <th class="text-center"><center>Angka <br> Kredit</center></th>
      <th class="text-center"><center>Jumlah Angka Kredit</center></th>
      <th>Bukti Fisik</th>
    </tr>

    @foreach ($jabatanPimpinan as $key => $value)
        <tr>
          <td><center>{{ ++$key }}</center></td>
          <td>{{ $value->nama_kegiatan }}</td>
          <td>{{ $value->tahun }}</td>
          <td><center>-</center></td>
          <td><center>{{ $value->volume_kegiatan }}</center></td>
          <td><center>{{ $value->angka_kredit }}</center></td>
          <td><center>{{ $value->volume_kegiatan * $value->angka_kredit}} </center></td>
          <td><center>{{ $value->bukti_fisik_desc }}</center></td>
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
      <th class="text-center"><center>{{ $jabatanPimpinanCount }}</center></th>
      </tr>
  </table>

  <p><strong>M. Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi </strong></p>

  <table class="table" id="customers" width="100%">
    <tr>
      <th style="width:'1%'"><center>No</center></th>
      <th>Uraian Kegiatan</th>
      <th><center>Jam</center></th>
      <th><center>Tanggal</center></th>
      <th><center>Hasil <br> Satuan</center></th>
      <th class="text-center"><center>Volume <br> Kegiatan</center></th>
      <th class="text-center"><center>Angka <br> Kredit</center></th>
      <th class="text-center"><center>Jumlah Angka Kredit</center></th>
      <th>Bukti Fisik</th>
    </tr>

    @foreach ($pengembanganDiri as $key => $value)
        <tr>
          <td><center>{{ ++$key }}</center></td>
          <td>{{ $value->nama_kegiatan }} </td>
          <td><center>{{ $value->jam }}</center></td>
          <td>{{ $value->tahun }}</td>
          <td><center>Jam</center></td>
          <td><center>{{ $value->volume_kegiatan }}</center></td>
          <td><center>{{ $value->angka_kredit }}</center></td>
          <td><center>{{ $value->volume_kegiatan * $value->angka_kredit}} </center></td>
          <td><center>{{ $value->bukti_fisik_desc }}</center></td>
      </tr>
    @endforeach

    <tr>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th style="border:0px;"></th>
      <th class="text-center"><strong>Sub Jumlah</strong></th>
      <th class="text-center"><center>{{ $pengembanganDiriCount }}</center></th>
    </tr>
  </table>

  <br>
  <table class="table" id="customers" width="100%">

      <tr>
      <th style="border:0px;"><strong>Jumlah Bidang A </strong></th>
      <th style="border:0px;"><center>{{ $jumlahBidangA }}</center></th>
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
