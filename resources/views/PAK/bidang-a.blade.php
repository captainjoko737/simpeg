
<h3><u><strong>PENDIDIKAN</strong></u></h3>
<br>

<table class="table table-striped">
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
<hr>

<p><strong>A. Pelaksanaan Pendidikan</strong></u></p>

<table class="table table-striped">
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
			  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
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
			  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
			</tr>
		@endif
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $pelaksPendidikanCount }}</th>
    
</table>
<hr>

<p><strong>B. Membimbing Seminar</strong></u></p>

<table class="table table-striped">
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
			  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
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
			  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
			</tr>
		@endif
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $bimbinganSeminarCount }}</th>
    
</table>

<hr>

<p><strong>C. Membimbing kuliah kerja nyata, praktek kerja nyata, praktek kerja lapangan</strong></u></p>

<table class="table table-striped">
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
			  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
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
			  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
			</tr>
		@endif
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $bimbinganKkpCount }}</th>
    
</table>

<hr>

<p><strong>D. Membimbing dan ikut membimbing dalam menghasilkan disertasi, thesis, skripsi dan laporan akhir studi</strong></u></p>

<table class="table table-striped">
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
				  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
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
				  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
				</tr>
			@endforeach
			<th></th>
			<th></th>
		@endif
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $bimbinganLaporanAkhirCount }}</th>
    
</table>

<hr>

<p><strong>E. Bertugas sebagai penguji pada ujian akhir</strong></u></p>

<table class="table table-striped">
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
				  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
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
				  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
				</tr>
			@endforeach
			<th></th>
			<th></th>
		@endif
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $pengujiCount }}</th>
    
</table>

<hr>

<p><strong>F. Membina kegiatan mahasiswa</strong></u></p>

<table class="table table-striped">
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
			  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
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
			  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
			</tr>
			<th></th>
			<th></th>
		@endif
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $kegiatanMahasiswaCount }}</th>
    
</table>

<hr>

<p><strong>G. Mengembangkan program kuliah</strong></u></p>

<table class="table table-striped">
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
			  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
			</tr>
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	
	
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $programKuliahCount }}</th>
    
</table>

<hr>

<p><strong>H. Mengembangkan bahan pengajaran</strong></u></p>

<table class="table table-striped">
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
			  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$values->bukti_fisik }}" target="_blank">{{ $values->bukti_fisik_desc }}</a></td>
			</tr>
		
	@endforeach

	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	
	
	<th class="text-center"><strong>Sub Jumlah</strong></th>
	<th class="text-center">{{ $bahanPengajaranCount }}</th>
    
</table>

