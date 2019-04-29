
<h3><u><strong>PENDIDIKAN</strong></u></h3>
<br>

<h5><u>Yang Bertanda tangan di bawah ini</u></h5>

<div class="form-group row">
  <div class="col-xs-4">
    <label for="nama">Nama : </label>
    <input class="form-control" id="A_nama" name="A_nama" type="text" value="{{$penanggung->nama}}">
  </div>
  <div class="col-xs-4">
    <label for="nip">NIP : </label>
    <input class="form-control" id="A_nip" name="A_nip" type="text" value="{{$penanggung->nip}}">
  </div>
  <div class="col-xs-4">
    <label for="pangkat">Pangkat / Golongan Ruang  : </label>
    <input class="form-control" id="A_pangkat" name="A_pangkat" type="text" value="{{$penanggung->pangkat}}">
  </div>
</div> 
<div class="form-group row">
  <div class="col-xs-4">
    <label for="jp">Jabatan Fungsional : </label>
    <input class="form-control" id="A_jf" name="A_jf" type="text" value="{{$penanggung->jabatan_fungsional}}">
  </div>
  <div class="col-xs-4">
    <label for="jp">Jabatan Struktural : </label>
    <input class="form-control" id="A_js" name="A_js" type="text" value="{{$penanggung->jabatan_struktural}}">
  </div>
  <div class="col-xs-4">
    <label for="unit">Unit Kerja : </label>
    <input class="form-control" id="A_unit" name="A_unit" type="text" value="{{$penanggung->unit_kerja}}">
  </div>
  <div class="col-xs-4">
    <label for="unit">Tanggal Cetak : </label>
    <input class="form-control" id="A_tanggal_cetak" name="A_tanggal_cetak" type="text">
  </div>
</div>

<h5><u>Menyatakan Bahwa</u></h5>

<table class="table table-clear">
	<tr>
	  <td style="width:20%;">Nama</td>
	  <td style="width:1%;">:</td>
	  <td> {{ $data_dosen->nama }}</td>
	</tr>

	<tr>
	  <td style="width:20%;">NIP</td>
	  <td style="width:1%;">:</td>
	  <td> {{ $data_dosen->nip }}</td>
	</tr>

	<tr>
	  <td style="width:20%;">Pangkat / Golongan Ruang</td>
	  <td style="width:1%;">:</td>
	  <td> {{ $data_dosen->pangkat }}</td>
	</tr>

	<tr>
	  <td style="width:20%;">Jabatan Fungsional</td>
	  <td style="width:1%;">:</td>
	  <td> {{ $data_dosen->jabatan_fungsional }}</td>
	</tr>

	<tr>
	  <td style="width:20%;">Unit Kerja</td>
	  <td style="width:1%;">:</td>
	  <td> Universitas Islam Nusantara</td>
	</tr>
</table>
<hr>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	@foreach ($pendidikanFormal as $key => $value)
                
	    <tr>
	      <td>{{ ++$key }}</td>
	      <td>{{ $value->jenjang_studi }} ( {{$value->gelar_akademik}} )</td>
	      <td>{{ $value->tanggal_kelulusan }}</td>
	      <td>Ijazah</td>
	      <td></td>
	      <td></td>
	    </tr>

    @endforeach

</table>
<br>

<p><strong>A. Pelaksanaan Pendidikan</strong></u></p>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>
	<th><strong>Semester Ganjil :</strong></th>

	@foreach ($pelaksPendidikan as $key => $value)
		@if($value->semester == 1)
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama_pelaksanaan }}</td>
			  	<td>{{ $value->periode }}</td>
			  	<td>-</td>
			  	<td class="text-center">{{ $value->jumlah_sks }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
			</tr>
		@endif
		
	@endforeach

	<th></th>
	<th><strong>Semester Genap :</strong></th>

	@foreach ($pelaksPendidikan as $key => $value)
		@if($value->semester == 0)
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama_pelaksanaan }}</td>
			  	<td>{{ $value->periode }}</td>
			  	<td>-</td>
			  	<td class="text-center">{{ $value->jumlah_sks }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
			</tr>
		@endif
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $pelaksPendidikanCount }}</th>
    
</table>
<br>

<p><strong>B. Membimbing Seminar</strong></u></p>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">SKS</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>
	<th><strong>Semester Ganjil :</strong></th>

	@foreach ($bimbinganSeminar as $key => $value)
		@if($value->semester == 1)
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama_bimbingan }}</td>
			  	<td>{{ $value->tahun }}</td>
			  	<td>-</td>
			  	<td class="text-center">{{ $value->jumlah_sks }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
			</tr>
		@endif
		
	@endforeach

	<th></th>
	<th><strong>Semester Genap :</strong></th>

	@foreach ($bimbinganSeminar as $key => $value)
		@if($value->semester == 0)
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama_bimbingan }}</td>
			  	<td>{{ $value->tahun }}</td>
			  	<td>-</td>
			  	<td class="text-center">{{ $value->jumlah_sks }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
			</tr>
		@endif
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $bimbinganSeminarCount }}</th>
    
</table>

<br>

<p><strong>C. Membimbing kuliah kerja nyata, praktek kerja nyata, praktek kerja lapangan</strong></u></p>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Periode</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">SKS</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>
	<th><strong>Semester Ganjil :</strong></th>

	@foreach ($bimbinganKkp as $key => $value)
		@if($value->semester == 1)
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama_bimbingan }}</td>
			  	<td>{{ $value->tahun }}</td>
			  	<td>-</td>
			  	<td class="text-center">{{ $value->jumlah_sks }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
			</tr>
		@endif
		
	@endforeach

	<th></th>
	<th><strong>Semester Genap :</strong></th>

	@foreach ($bimbinganKkp as $key => $value)
		@if($value->semester == 0)
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama_bimbingan }}</td>
			  	<td>{{ $value->tahun }}</td>
			  	<td>-</td>
			  	<td class="text-center">{{ $value->jumlah_sks }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
			</tr>
		@endif
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $bimbinganKkpCount }}</th>
    
</table>

<br>

<p><strong>D. Membimbing dan ikut membimbing dalam menghasilkan disertasi, thesis, skripsi dan laporan akhir studi</strong></u></p>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Periode</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">SKS</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>
	<th><strong>Semester Ganjil :</strong></th>

	@foreach ($bimbinganLaporanAkhir as $key => $value)
		@if($value->semester == 1)
		  	<tr>
			  	<td><strong>{{ ++$key }}</strong></td>
			  	<td><strong>{{ $value->jenis_bimbingan }} {{ count($value->mahasiswa) }} orang mahasiswa</strong></td>
			  	<td><strong>{{ $value->tahun }}</strong></td>
			  	<td><strong>{{ $value->status }}</strong></td>
			  	<td class="text-center"><strong>-</strong></td>
			  	<td class="text-center"><strong>{{ count($value->mahasiswa) }}</strong></td>
			  	<td class="text-center"><strong>{{ $value->jumlah }}</strong></td>
			  	<td><strong>-</strong></td>
			</tr>

			@foreach ($value->mahasiswa as $keys => $values) 
				<tr>
				  	<td></td>
				  	<td>{{ $values->nama_mahasiswa }}</td>
				  	<td>{{ $values->nim_mahasiswa }}</td>
				  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
				</tr>
			@endforeach
		@endif
	@endforeach

	<th></th>
	<th><strong>Semester Genap :</strong></th>

	@foreach ($bimbinganLaporanAkhir as $key => $value)
		@if($value->semester == 0)
		  	<tr>
			  	<td><strong>{{ ++$key }}</strong></td>
			  	<td><strong>{{ $value->jenis_bimbingan }} {{ count($value->mahasiswa) }} orang mahasiswa</strong></td>
			  	<td><strong>{{ $value->tahun }}</strong></td>
			  	<td><strong>{{ $value->status }}</strong></td>
			  	<td class="text-center"><strong>-</strong></td>
			  	<td class="text-center"><strong>{{ count($value->mahasiswa) }}</strong></td>
			  	<td class="text-center"><strong>{{ $value->jumlah }}</strong></td>
			  	<td><strong>-</strong></td>
			</tr>

			@foreach ($value->mahasiswa as $keys => $values) 
				<tr>
				  	<td></td>
				  	<td>{{ $values->nama_mahasiswa }}</td>
				  	<td>{{ $values->nim_mahasiswa }}</td>
				  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
				</tr>
			@endforeach
			<th></th>
			<th></th>
		@endif
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $bimbinganLaporanAkhirCount }}</th>
    
</table>

<br>

<p><strong>E. Bertugas sebagai penguji pada ujian akhir</strong></u></p>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Periode</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">SKS</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>
	<th><strong>Semester Ganjil :</strong></th>

	@foreach ($penguji as $key => $value)
		@if($value->semester == 1)
		  	<tr>
			  	<td><strong>{{ ++$key }}</strong></td>
			  	<td><strong>Penguji Ujian Akhir {{ count($value->mahasiswa) }} orang mahasiswa</strong></td>
			  	<td><strong>{{ $value->tahun }}</strong></td>
			  	<td class="text-center"><strong>-</strong></td>
			  	<td class="text-center"><strong>-</strong></td>
			  	<td class="text-center"><strong>{{ count($value->mahasiswa) }}</strong></td>
			  	<td class="text-center"><strong>{{ $value->jumlah }}</strong></td>
			  	<td><strong>-</strong></td>
			</tr>

			@foreach ($value->mahasiswa as $keys => $values) 
				<tr>
				  	<td></td>
				  	<td>{{ $values->nama_mahasiswa }}</td>
				  	<td>{{ $values->nim_mahasiswa }}</td>
				  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
				</tr>
			@endforeach
		@endif
	@endforeach

	<th></th>
	<th><strong>Semester Genap :</strong></th>

	@foreach ($penguji as $key => $value)
		@if($value->semester == 0)
		  	<tr>
			  	<td><strong>{{ ++$key }}</strong></td>
			  	<td><strong>Penguji Ujian Akhir {{ count($value->mahasiswa) }} orang mahasiswa</strong></td>
			  	<td><strong>{{ $value->tahun }}</strong></td>
			  	<td class="text-center"><strong>-</strong></td>
			  	<td class="text-center"><strong>-</strong></td>
			  	<td class="text-center"><strong>{{ count($value->mahasiswa) }}</strong></td>
			  	<td class="text-center"><strong>{{ $value->jumlah }}</strong></td>
			  	<td><strong>-</strong></td>
			</tr>

			@foreach ($value->mahasiswa as $keys => $values) 
				<tr>
				  	<td></td>
				  	<td>{{ $values->nama_mahasiswa }}</td>
				  	<td>{{ $values->nim_mahasiswa }}</td>
				  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
				</tr>
			@endforeach
			<th></th>
			<th></th>
		@endif
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $pengujiCount }}</th>
    
</table>

<br>

<p><strong>F. Membina kegiatan mahasiswa</strong></u></p>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Periode</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>
	<th><strong>Semester Ganjil :</strong></th>

	@foreach ($kegiatanMahasiswa as $key => $value)
		@if($value->semester == 1)
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama }}</td>
			  	<td>{{ $value->tahun }}</td>
			  	<td class="text-center">-</td>
			  	<td class="text-center">{{ $value->volume_kegiatan }}</td>
			  	<td class="text-center">1</td>
			  	<td class="text-center">1</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
			</tr>
		@endif
	@endforeach

	<th></th>
	<th><strong>Semester Genap :</strong></th>

	@foreach ($kegiatanMahasiswa as $key => $value)
		@if($value->semester == 0)
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama }}-</td>
			  	<td>{{ $value->tahun }}</td>
			  	<td class="text-center">-</td>
			  	<td class="text-center">{{ $value->volume_kegiatan }}</td>
			  	<td class="text-center">1</td>
			  	<td class="text-center">1</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
			</tr>
			<th></th>
			<th></th>
		@endif
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $kegiatanMahasiswaCount }}</th>
    
</table>

<br>

<p><strong>G. Mengembangkan program kuliah</strong></u></p>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Periode</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	@foreach ($programKuliah as $key => $value)
		
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama }}</td>
			  	<td>{{ $value->tahun }}</td>
			  	<td class="text-center">-</td>
			  	<td class="text-center">{{ $value->volume_kegiatan }}</td>
			  	<td class="text-center">2</td>
			  	<td class="text-center">{{ $value->volume_kegiatan * 2 }}</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
			</tr>
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $programKuliahCount }}</th>
    
</table>

<br>

<p><strong>H. Mengembangkan bahan pengajaran</strong></u></p>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Periode</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	@foreach ($bahanPengajaran as $key => $value)
		
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama }}</td>
			  	<td>{{ $value->tahun }}</td>
			  	<td class="text-center">-</td>
			  	<td class="text-center">{{ $value->volume_kegiatan }}</td>
			  	<td class="text-center">5</td>
			  	<td class="text-center">{{ $value->volume_kegiatan * 5 }}</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
			</tr>
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $bahanPengajaranCount }}</th>
    
    
</table>

<br>

<p><strong>J. Menduduki jabatan pimpinan perguruan tinggi </strong></u></p>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Periode</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	@foreach ($jabatanPimpinan as $key => $value)
		
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama_kegiatan }}</td>
			  	<td>{{ $value->tahun }}</td>
			  	<td class="text-center">-</td>
			  	<td class="text-center">{{ $value->volume_kegiatan }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td class="text-center">{{ $value->volume_kegiatan * $value->angka_kredit }}</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
			</tr>
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $jabatanPimpinanCount }}</th>
    
</table>

<br>

<p><strong>M. Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi </strong></u></p>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th class="text-center">Jam</th>
	  <th>Periode</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	@foreach ($pengembanganDiri as $key => $value)
		
		  	<tr>
			  	<td>{{ ++$key }}</td>
			  	<td>{{ $value->nama_kegiatan }}</td>
			  	<td class="text-center">{{ $value->jam }}</td>
			  	<td>{{ $value->tahun }}</td>
			  	<td class="text-center">Jam</td>
			  	<td class="text-center">{{ $value->volume_kegiatan }}</td>
			  	<td class="text-center">{{ $value->angka_kredit }}</td>
			  	<td class="text-center">{{ $value->volume_kegiatan * $value->angka_kredit }}</td>
			  	<td><a href="{{ url('/public/assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
			</tr>
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $pengembanganDiriCount }}</th>
    
    <tr>
		<th></th>
		<th style="color:transparent;">s</th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th class="text-center"></th>
		<th class="text-center"></th>
    </tr>
    <tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th class="text-center"><strong>Jumlah Bidang A</strong></th>
		<th class="text-center">{{ $jumlahBidangA }}</th>
    </tr>
</table>



<div class="row">
	<div class="col-xs-3">
		<button type="button" onclick="printBidangA({!! $data_dosen->id_user !!})" class="btn btn-success btn-block btn-flat"> <i class="fa fa-print"><strong> Print Bidang A </strong></i></button>
	</div>
</div>

<script type="text/javascript">

	function printBidangA(id) {
		var nama = document.getElementById("A_nama").value;
		var nip = document.getElementById("A_nip").value;
		var pangkat = document.getElementById("A_pangkat").value;
		var jabatan_fungsional = document.getElementById("A_jf").value;
		var unit = document.getElementById("A_unit").value;
		var tglCetak = document.getElementById("A_tanggal_cetak").value;
		var jabatan_struktural = document.getElementById("A_js").value;

		if (document.getElementById("A_nama").value) {
			if (document.getElementById("A_nip").value) {
				if (document.getElementById("A_pangkat").value) {
					if (document.getElementById("A_jf").value) {
						if (document.getElementById("A_tanggal_cetak").value) {
							if (document.getElementById("A_js").value) {
								if (document.getElementById("A_unit").value) {
									window.open(
					                  '/pak/a/prints/'+id+'/'+nama+'/'+nip+'/'+pangkat.replace('/', '*')+'/'+jabatan_fungsional+'/'+unit+'/'+tglCetak+'/'+jabatan_struktural,
					                  '_blank' // <- This is what makes it open in a new window.
					                );
								}else{
									alert('Harap Lengkapi data input');
								}
							}else{
								alert('Harap Lengkapi data input');
							}
						}else{
							alert('Harap Lengkapi data input');
						}
						
					}else{
						alert('Harap Lengkapi data input');
					}
				}else{
					alert('Harap Lengkapi data input');
				}
			}else{
				alert('Harap Lengkapi data input');
			}
		}else{
			alert('Harap Lengkapi data input');
		}

	}

</script>
