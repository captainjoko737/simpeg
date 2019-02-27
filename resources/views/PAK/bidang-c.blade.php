
<h3><u><strong>PENGABDIAN</strong></u></h3>
<br>

<h5><u>Yang Bertanda tangan di bawah ini</u></h5>

<div class="form-group row">
  <div class="col-xs-4">
    <label for="nama">Nama : </label>
    <input class="form-control" id="C_nama" name="C_nama" type="text" value="{{$penanggung->nama}}">
  </div>
  <div class="col-xs-4">
    <label for="nip">NIP : </label>
    <input class="form-control" id="C_nip" name="C_nip" type="text" value="{{$penanggung->nip}}">
  </div>
  <div class="col-xs-4">
    <label for="pangkat">Pangkat / Golongan Ruang  : </label>
    <input class="form-control" id="C_pangkat" name="C_pangkat" type="text" value="{{$penanggung->pangkat}}">
  </div>
</div> 
<div class="form-group row">
  <div class="col-xs-4">
    <label for="jp">Jabatan Fungsional : </label>
    <input class="form-control" id="C_jf" name="C_jf" type="text" value="{{$penanggung->jabatan_fungsional}}">
  </div>
  <div class="col-xs-4">
    <label for="jp">Jabatan Struktural : </label>
    <input class="form-control" id="C_js" name="C_js" type="text" value="{{$penanggung->jabatan_struktural}}">
  </div>
  <div class="col-xs-4">
    <label for="unit">Unit Kerja : </label>
    <input class="form-control" id="C_unit" name="C_unit" type="text" value="{{$penanggung->unit_kerja}}">
  </div>
  <div class="col-xs-4">
    <label for="unit">Tanggal Cetak : </label>
    <input class="form-control" id="C_tanggal_cetak" name="C_tanggal_cetak" type="text">
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

<br>

<h4>A. Menduduki Jabatan Pimpinan</u></h4>

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
	
	@foreach ($pengabdianA as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tanggal_kegiatan }}</td>
		  	<td>{{ $value->satuan_hasil }}</td>
		  	<td class="text-center">{{ $value->volume_kegiatan }}</td>
		  	<td class="text-center">{{ $value->angka_kredit }}</td>
		  	<td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
		  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
		</tr>
		
	@endforeach
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th class="text-center"><strong>Sub Jumlah</strong></th>
		<th class="text-center">{{ $pengabdianACount }}</th>
    </tr>
</table>
<hr>

<h4>B. Melaksanakan Pengembangan Hasil Pendidikan dan Penelitian</u></h4>

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
	
	@foreach ($pengabdianB as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tanggal_kegiatan }}</td>
		  	<td>{{ $value->satuan_hasil }}</td>
		  	<td class="text-center">{{ $value->volume_kegiatan }}</td>
		  	<td class="text-center">{{ $value->angka_kredit }}</td>
		  	<td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
		  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
		</tr>
		
	@endforeach
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th class="text-center"><strong>Sub Jumlah</strong></th>
		<th class="text-center">{{ $pengabdianBCount }}</th>
    </tr>
</table>
<hr>

<h4>C. Memberi Latihan / Penyuluhan / Penataran / Ceramah pada Masyarakat</u></h4>

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
	
	@foreach ($pengabdianC as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tanggal_kegiatan }}</td>
		  	<td>{{ $value->satuan_hasil }}</td>
		  	<td class="text-center">{{ $value->volume_kegiatan }}</td>
		  	<td class="text-center">{{ $value->angka_kredit }}</td>
		  	<td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
		  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
		</tr>
		
	@endforeach
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th class="text-center"><strong>Sub Jumlah</strong></th>
		<th class="text-center">{{ $pengabdianCCount }}</th>
    </tr>
</table>
<hr>

<h4>D. Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas umum </u></h4>

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
	
	@foreach ($pengabdianD as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tanggal_kegiatan }}</td>
		  	<td>{{ $value->satuan_hasil }}</td>
		  	<td class="text-center">{{ $value->volume_kegiatan }}</td>
		  	<td class="text-center">{{ $value->angka_kredit }}</td>
		  	<td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
		  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
		</tr>
		
	@endforeach
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th class="text-center"><strong>Sub Jumlah</strong></th>
		<th class="text-center">{{ $pengabdianDCount }}</th>
    </tr>
</table>
<hr>

<h4>E. Membuat / menulis karya pengabdian  </u></h4>

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
	
	@foreach ($pengabdianE as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tanggal_kegiatan }}</td>
		  	<td>{{ $value->satuan_hasil }}</td>
		  	<td class="text-center">{{ $value->volume_kegiatan }}</td>
		  	<td class="text-center">{{ $value->angka_kredit }}</td>
		  	<td class="text-center">{{ $value->angka_kredit * $value->volume_kegiatan }}</td>
		  	<td><a href="{{ url('assets/bukti_fisik/').'/'.$value->bukti_fisik }}" target="_blank">{{ $value->bukti_fisik_desc }}</a></td>
		</tr>
		
	@endforeach
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th class="text-center"><strong>Sub Jumlah</strong></th>
		<th class="text-center">{{ $pengabdianECount }}</th>
    </tr>

    <hr>
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
		<th class="text-center"><strong>Jumlah Bidang C</strong></th>
		<th class="text-center">{{ $jumlahBidangC }}</th>
    </tr>
</table>

<div class="row">
	<div class="col-xs-3">
		<button type="button" onclick="printBidangC({!! $data_dosen->id_user !!})" class="btn btn-success btn-block btn-flat"> <i class="fa fa-print"><strong> Print Bidang C </strong></i></button>
	</div>
</div>

<script type="text/javascript">

	function printBidangC(id) {
		var nama = document.getElementById("C_nama").value;
		var nip = document.getElementById("C_nip").value;
		var pangkat = document.getElementById("C_pangkat").value;
		var jabatan_fungsional = document.getElementById("C_jf").value;
		var unit = document.getElementById("C_unit").value;
		var tglCetak = document.getElementById("C_tanggal_cetak").value;
		var jabatan_struktural = document.getElementById("C_js").value;

		if (document.getElementById("C_nama").value) {
			if (document.getElementById("C_nip").value) {
				if (document.getElementById("C_pangkat").value) {
					if (document.getElementById("C_jf").value) {
						if (document.getElementById("C_tanggal_cetak").value) {
							if (document.getElementById("C_js").value) {
								if (document.getElementById("C_unit").value) {
									window.open(
					                  '/pak/c/prints/'+id+'/'+nama+'/'+nip+'/'+pangkat.replace('/', '*')+'/'+jabatan_fungsional+'/'+unit+'/'+tglCetak+'/'+jabatan_struktural,
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


