<h3><u><strong>PENELITIAN</strong></u></h3>
<br>

<h5><u>Yang Bertanda tangan di bawah ini</u></h5>

<div class="form-group row">
  <div class="col-xs-4">
    <label for="nama">Nama : </label>
    <input class="form-control" id="B_nama" name="B_nama" type="text" value="{{$penanggung->nama}}">
  </div>
  <div class="col-xs-4">
    <label for="nip">NIP : </label>
    <input class="form-control" id="B_nip" name="B_nip" type="text" value="{{$penanggung->nip}}">
  </div>
  <div class="col-xs-4">
    <label for="pangkat">Pangkat / Golongan Ruang  : </label>
    <input class="form-control" id="B_pangkat" name="B_pangkat" type="text" value="{{$penanggung->pangkat}}">
  </div>
</div> 
<div class="form-group row">
  <div class="col-xs-4">
    <label for="jp">Jabatan Fungsional : </label>
    <input class="form-control" id="B_jf" name="B_jf" type="text" value="{{$penanggung->jabatan_fungsional}}">
  </div>
  <div class="col-xs-4">
    <label for="jp">Jabatan Struktural : </label>
    <input class="form-control" id="B_js" name="B_js" type="text" value="{{$penanggung->jabatan_struktural}}">
  </div>
  <div class="col-xs-4">
    <label for="unit">Unit Kerja : </label>
    <input class="form-control" id="B_unit" name="B_unit" type="text" value="{{$penanggung->unit_kerja}}">
  </div>
  <div class="col-xs-4">
    <label for="unit">Tanggal Cetak : </label>
    <input class="form-control" id="B_tanggal_cetak" name="B_tanggal_cetak" type="text">
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

<h4>A. Menghasilkan Karya Ilmiah </u></h4>
<br>
<h5><strong>1. Hasil Penelitian atau pemikiran yang dipublikasikan</strong></h5>

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
	
	@foreach ($penelitianA1 as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tanggal }}</td>
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
		<th class="text-center">{{ $penelitianA1Count }}</th>
    </tr>
</table>
<hr>

<h5><strong>2. Hasil Penelitian atau hasil pemikiran yang tidak dipublikasikan ( tersimpan di perpustakaan perguruan tinggi )</strong></h5>

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
	
	@foreach ($penelitianA2 as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tanggal }}</td>
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
		<th class="text-center">{{ $penelitianA2Count }}</th>
    </tr>
</table>
<hr>

<h4>B. Menerjemahkan / menyadur buku ilmiah</u></h4>

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
	
	@foreach ($penelitianB as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tanggal }}</td>
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
		<th class="text-center">{{ $penelitianBCount }}</th>
    </tr>
</table>
<hr>

<h4>C. Mengedit / menyunting karya ilmiah </u></h4>

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
	
	@foreach ($penelitianC as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tanggal }}</td>
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
		<th class="text-center">{{ $penelitianCCount }}</th>
    </tr>
</table>
<hr>

<h4>D. Membuat rencana dan karya teknologi yang dipatenkan </u></h4>

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
	
	@foreach ($penelitianD as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tanggal }}</td>
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
		<th class="text-center">{{ $penelitianDCount }}</th>
    </tr>
</table>
<hr>

<h4>E. Membuat rancangan dan karya teknologi, rancangan dan karya seni monumental / seni pertunjukan / karya sastra </u></h4>

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
	
	@foreach ($penelitianE as $key => $value)
		<tr>
		  	<td>{{ ++$key }}</td>
		  	<td>{{ $value->nama_kegiatan }}</td>
		  	<td>{{ $value->tanggal }}</td>
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
		<th class="text-center">{{ $penelitianECount }}</th>
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
		<th class="text-center"><strong>Jumlah Bidang B</strong></th>
		<th class="text-center">{{ $jumlahBidangB }}</th>
    </tr>
</table>

<div class="row">
	<div class="col-xs-3">
		<button type="button" onclick="printBidangB({!! $data_dosen->id_user !!})" class="btn btn-success btn-block btn-flat"> <i class="fa fa-print"><strong> Print Bidang B </strong></i></button>
	</div>
</div>

<script type="text/javascript">

	function printBidangB(id) {
		var nama = document.getElementById("B_nama").value;
		var nip = document.getElementById("B_nip").value;
		var pangkat = document.getElementById("B_pangkat").value;
		var jabatan_fungsional = document.getElementById("B_jf").value;
		var unit = document.getElementById("B_unit").value;
		var tglCetak = document.getElementById("B_tanggal_cetak").value;
		var jabatan_struktural = document.getElementById("B_js").value;

		if (document.getElementById("B_nama").value) {
			if (document.getElementById("B_nip").value) {
				if (document.getElementById("B_pangkat").value) {
					if (document.getElementById("B_jf").value) {
						if (document.getElementById("B_tanggal_cetak").value) {
							if (document.getElementById("B_js").value) {
								if (document.getElementById("B_unit").value) {
									window.open(
					                  '/pak/b/prints/'+id+'/'+nama+'/'+nip+'/'+pangkat.replace('/', '*')+'/'+jabatan_fungsional+'/'+unit+'/'+tglCetak+'/'+jabatan_struktural,
					                  '_blank' // <- This is what makes it open in a new window.
					                );
								}else{
									console.log('a');
									alert('Harap Lengkapi data input');
								}
							}else{
								console.log('b');
								alert('Harap Lengkapi data input');
							}
						}else{
							console.log('c');
							alert('Harap Lengkapi data input');
						}
					}else{
						console.log('d');
						alert('Harap Lengkapi data input');
					}
				}else{
					console.log('e');
					alert('Harap Lengkapi data input');
				}
			}else{
				console.log('f');
				alert('Harap Lengkapi data input');
			}
		}else{
			console.log('g');
			alert('Harap Lengkapi data input');
		}

	}

</script>


