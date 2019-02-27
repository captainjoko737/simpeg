
<h3><u><strong>PENUNJANG</strong></u></h3>
<br>

<h5><u>Yang Bertanda tangan di bawah ini</u></h5>

<div class="form-group row">
  <div class="col-xs-4">
    <label for="nama">Nama : </label>
    <input class="form-control" id="D_nama" name="D_nama" type="text" value="{{$penanggung->nama}}">
  </div>
  <div class="col-xs-4">
    <label for="nip">NIP : </label>
    <input class="form-control" id="D_nip" name="D_nip" type="text" value="{{$penanggung->nip}}">
  </div>
  <div class="col-xs-4">
    <label for="pangkat">Pangkat / Golongan Ruang  : </label>
    <input class="form-control" id="D_pangkat" name="D_pangkat" type="text" value="{{$penanggung->pangkat}}">
  </div>
</div> 
<div class="form-group row">
  <div class="col-xs-4">
    <label for="jp">Jabatan Fungsional : </label>
    <input class="form-control" id="D_jf" name="D_jf" type="text" value="{{$penanggung->jabatan_fungsional}}">
  </div>
  <div class="col-xs-4">
    <label for="jp">Jabatan Struktural : </label>
    <input class="form-control" id="D_js" name="D_js" type="text" value="{{$penanggung->jabatan_struktural}}">
  </div>
  <div class="col-xs-4">
    <label for="unit">Unit Kerja : </label>
    <input class="form-control" id="D_unit" name="D_unit" type="text" value="{{$penanggung->unit_kerja}}">
  </div>
  <div class="col-xs-4">
    <label for="unit">Tanggal Cetak : </label>
    <input class="form-control" id="D_tanggal_cetak" name="D_tanggal_cetak" type="text">
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

<h4>A. Menjadi anggota dalam suatu panitia / Badan pada perguruan tinggi</u></h4>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tingkat</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>
	
	@foreach ($penunjangA as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tingkat }}</td>
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
		<th class="text-center">{{ $penunjangACount }}</th>
    </tr>
</table>
<hr>

<h4>B. Menjadi anggota panitia / badan pada lembaga pemerintah </u></h4>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tingkat</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>
	
	@foreach ($penunjangB as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tingkat }}</td>
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
		<th class="text-center">{{ $penunjangBCount }}</th>
    </tr>
</table>

<hr>

<h4>C. Menjadi anggota organisasi profesi </u></h4>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tingkat</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>
	
	@foreach ($penunjangC as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tingkat }}</td>
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
		<th class="text-center">{{ $penunjangCCount }}</th>
    </tr>
</table>

<hr>

<h4>D. Mewakili perguruan tinggi / lembaga pemerintah </u></h4>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tingkat</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>
	
	@foreach ($penunjangD as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tingkat }}</td>
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
		<th class="text-center">{{ $penunjangDCount }}</th>
    </tr>
</table>


<hr>


<h4>E. Menjadi anggota delegasi nasional ke pertemuan internasional </u></h4>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tingkat</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>

	@foreach ($penunjangE as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tingkat }}</td>
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
		<th class="text-center">{{ $penunjangECount }}</th>
    </tr>
</table>


<hr>

<h4>F. Berperan serta aktif dalam pertemuan ilmiah </u></h4>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tingkat</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>

	@foreach ($penunjangF as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tingkat }}</td>
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
		<th class="text-center">{{ $penunjangFCount }}</th>
    </tr>
</table>


<hr>

<h4>G. Mendapat penghargaan / tanda jasa </u></h4>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tingkat</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>
	
	@foreach ($penunjangG as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tingkat }}</td>
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
		<th class="text-center">{{ $penunjangGCount }}</th>
    </tr>
</table>


<hr>

<h4>H. Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional </u></h4>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tingkat</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>

	@foreach ($penunjangH as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tingkat }}</td>
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
		<th class="text-center">{{ $penunjangHCount }}</th>
    </tr>
</table>


<hr>

<h4>I. Mempunyai prestasi di bidang olahraga / humaniora </u></h4>

<table class="table table-bordered">
	<tr>
	  <th style="width:'5%'">No</th>
	  <th>Uraian Kegiatan</th>
	  <th>Tingkat</th>
	  <th>Tanggal</th>
	  <th>Hasil Satuan</th>
	  <th class="text-center">Volume Kegiatan</th>
	  <th class="text-center">Angka Kredit</th>
	  <th class="text-center">Jumlah Angka Kredit</th>
	  <th>Bukti Fisik</th>
	</tr>

	<th></th>

	@foreach ($penunjangI as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tingkat }}</td>
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
		<th class="text-center">{{ $penunjangICount }}</th>
    </tr>
</table>


<hr>





<h4>J. Keanggotaan dalam tim penilaian</u></h4>

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
		<th style="border:40px;"></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th class="text-center"><strong>Jumlah Bidang D</strong></th>
		<th class="text-center">{{ $jumlahBidangD }}</th>
    </tr>
</table>

<div class="row">
	<div class="col-xs-3">
		<button type="button" onclick="printBidangD({!! $data_dosen->id_user !!})" class="btn btn-success btn-block btn-flat"> <i class="fa fa-print"><strong> Print Bidang D </strong></i></button>
	</div>
</div>

<script type="text/javascript">

	function printBidangD(id) {
		var nama = document.getElementById("D_nama").value;
		var nip = document.getElementById("D_nip").value;
		var pangkat = document.getElementById("D_pangkat").value;
		var jabatan_fungsional = document.getElementById("D_jf").value;
		var unit = document.getElementById("D_unit").value;
		var tglCetak = document.getElementById("D_tanggal_cetak").value;
		var jabatan_struktural = document.getElementById("D_js").value;

		if (document.getElementById("D_nama").value) {
			if (document.getElementById("D_nip").value) {
				if (document.getElementById("D_pangkat").value) {
					if (document.getElementById("D_jf").value) {
						if (document.getElementById("D_tanggal_cetak").value) {
							if (document.getElementById("D_js").value) {
								if (document.getElementById("D_unit").value) {
									window.open(
					                  '/pak/d/prints/'+id+'/'+nama+'/'+nip+'/'+pangkat.replace('/', '*')+'/'+jabatan_fungsional+'/'+unit+'/'+tglCetak+'/'+jabatan_struktural,
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


