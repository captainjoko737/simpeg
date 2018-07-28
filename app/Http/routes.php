<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::group(['middleware' => 'auth'], function(){

	Route::get('/profile/dataPribadi', 'Profile\DataPribadiCtrl@index');
	Route::get('/profile/inpassing', 'Profile\InpassingCtrl@index');
	Route::get('/profile/kepangkatan', 'Profile\KepangkatanCtrl@index');
	Route::get('/profile/jabatanFungsional', 'Profile\JabatanFungsionalCtrl@index');

	Route::get('/profile/edit/{id_user}/{id_edit}', 'Profile\DataPribadiCtrl@editProfile');
	
	Route::get('/profile/kepangkatan/add', 'Profile\KepangkatanCtrl@add');
	Route::post('postKepangkatan',['as'=>'postKepangkatan','uses'=>'Profile\KepangkatanCtrl@create']);
	Route::get('/profile/kepangkatan/edit/{id_kepangkatan}', 'Profile\KepangkatanCtrl@edit');
	Route::put('putKepangkatan',['as'=>'putKepangkatan','uses'=>'Profile\KepangkatanCtrl@save']);
	Route::delete('/profile/kepangkatan/delete', 'Profile\KepangkatanCtrl@drop');

	Route::get('/profile/jabatanFungsional/add', 'Profile\JabatanFungsionalCtrl@add');
	Route::post('postJabatanFungsional',['as'=>'postJabatanFungsional','uses'=>'Profile\JabatanFungsionalCtrl@create']);
	Route::get('/profile/jabatanFungsional/edit/{id_jabatanFungsional}', 'Profile\JabatanFungsionalCtrl@edit');
	Route::put('putJabatanFungsional',['as'=>'putJabatanFungsional','uses'=>'Profile\JabatanFungsionalCtrl@save']);
	Route::delete('/profile/jabatanFungsional/delete', 'Profile\JabatanFungsionalCtrl@drop');

	Route::get('/kualifikasi/pendidikanFormal/add', 'Kualifikasi\PendidikanFormalCtrl@add');
	Route::post('postPendidikanFormal',['as'=>'postPendidikanFormal','uses'=>'Kualifikasi\PendidikanFormalCtrl@create']);
	Route::get('/Kualifikasi/pendidikanFormal/edit/{id_pendidikan_formal}', 'Kualifikasi\PendidikanFormalCtrl@edit');
	Route::put('putPendidikanFormal',['as'=>'putPendidikanFormal','uses'=>'Kualifikasi\PendidikanFormalCtrl@save']);
	Route::delete('/Kualifikasi/pendidikanFormal/delete', 'Kualifikasi\PendidikanFormalCtrl@drop');

	Route::get('/pengabdian/jabatanStruktural/add', 'Pengabdian\JabatanStrukturalCtrl@add');
	Route::post('postJabatanStruktural',['as'=>'postJabatanStruktural','uses'=>'Pengabdian\JabatanStrukturalCtrl@create']);
	Route::get('/pengabdian/jabatanStruktural/edit/{id_jabatan_struktural}', 'Pengabdian\JabatanStrukturalCtrl@edit');
	Route::put('putJabatanStruktural',['as'=>'putJabatanStruktural','uses'=>'Pengabdian\JabatanStrukturalCtrl@save']);
	Route::delete('/pengabdian/jabatanStruktural/delete', 'Pengabdian\JabatanStrukturalCtrl@drop');

	Route::get('/penelitian/penelitian/add', 'Penelitian\PenelitianCtrl@tambahPenelitian');
	Route::post('postPenelitian',['as'=>'postPenelitian','uses'=>'Penelitian\PenelitianCtrl@AddPenelitian']);
	Route::get('/penelitian/penelitian/edit/{id_jabatan_struktural}', 'Penelitian\PenelitianCtrl@editPenelitian');
	Route::put('putPenelitian',['as'=>'putPenelitian','uses'=>'Penelitian\PenelitianCtrl@SavePenelitian']);
	Route::delete('/penelitian/penelitian/delete', 'Penelitian\PenelitianCtrl@deletePenelitian');

	Route::get('/pelaksanaan/pendidikan/add', 'PelaksanaanPendidikan\PelaksanaanPendidikanCtrl@add');
	Route::post('postPelaksanaanPendidikan',['as'=>'postPelaksanaanPendidikan','uses'=>'PelaksanaanPendidikan\PelaksanaanPendidikanCtrl@Create']);
	Route::get('/pelaksanaan/pendidikan/edit/{id_pelaksanaan_pendidikan}', 'PelaksanaanPendidikan\PelaksanaanPendidikanCtrl@edit');
	Route::put('putPelaksanaanPendidikan',['as'=>'putPelaksanaanPendidikan','uses'=>'PelaksanaanPendidikan\PelaksanaanPendidikanCtrl@save']);
	Route::delete('/pelaksanaan/pendidikan/delete', 'PelaksanaanPendidikan\PelaksanaanPendidikanCtrl@delete');

	Route::get('/kualifikasi/pendidikanFormal', 'Kualifikasi\PendidikanFormalCtrl@index');
	Route::get('/kopetensi/sertifikasi', 'Kopetensi\SertifikasiCtrl@index');
	Route::get('/penelitian/penelitian', 'Penelitian\PenelitianCtrl@index');
	Route::get('/penelitian/detailPenelitian/{id_penelitian}', 'Penelitian\PenelitianCtrl@detailPenelitian');
	Route::get('/penelitian/publikasiKarya', 'Penelitian\PublikasiKaryaCtrl@index');
	Route::get('/pengabdian/jabatanStruktural', 'Pengabdian\JabatanStrukturalCtrl@index');
	Route::get('/pelaksanaan/pendidikan', 'PelaksanaanPendidikan\PelaksanaanPendidikanCtrl@index');

	Route::get('/penelitian/publikasiKarya', 'Penelitian\PublikasiKaryaCtrl@index');
	Route::get('/penelitian/publikasiKarya/add', 'Penelitian\PublikasiKaryaCtrl@add');
	Route::post('postPublikasiKarya',['as'=>'postPublikasiKarya','uses'=>'Penelitian\PublikasiKaryaCtrl@create']);
	Route::get('/penelitian/publikasiKarya/edit/{id}', 'Penelitian\PublikasiKaryaCtrl@edit');
	Route::put('putPublikasiKarya',['as'=>'putPublikasiKarya','uses'=>'Penelitian\PublikasiKaryaCtrl@save']);
	Route::delete('/penelitian/publikasiKarya/delete', 'Penelitian\PublikasiKaryaCtrl@drop');

	Route::post('putrequest',['as'=>'putrequest','uses'=>'Profile\DataPribadiCtrl@SaveProfile']);

	# BIMBINGAN SEMINAR
	Route::get('/bimbingan/seminar', 'Bimbingan\BimbinganCtrl@bimbinganSeminar');
	Route::get('/bimbingan/seminar/add', 'Bimbingan\BimbinganCtrl@addSeminar');
	Route::post('postBimbinganSeminar',['as'=>'postBimbinganSeminar','uses'=>'Bimbingan\BimbinganCtrl@CreateSeminar']);

	Route::get('/bimbingan/seminar/edit/{id_bimbingan_seminar}', 'Bimbingan\BimbinganCtrl@editSeminar');
	Route::put('putBimbinganSeminar',['as'=>'putBimbinganSeminar','uses'=>'Bimbingan\BimbinganCtrl@saveSeminar']);
	Route::delete('/bimbingan/seminar/delete', 'Bimbingan\BimbinganCtrl@deleteSeminar');

	# BIMBINGAN KKP
	Route::get('/bimbingan/kkp', 'Bimbingan\BimbinganCtrl@bimbinganKkp');
	Route::get('/bimbingan/kkp/add', 'Bimbingan\BimbinganCtrl@addKkp');
	Route::post('postBimbinganKkp',['as'=>'postBimbinganKkp','uses'=>'Bimbingan\BimbinganCtrl@CreateKkp']);

	Route::get('/bimbingan/kkp/edit/{id_bimbingan_kkp}', 'Bimbingan\BimbinganCtrl@editKkp');
	Route::put('putBimbinganKkp',['as'=>'putBimbinganKkp','uses'=>'Bimbingan\BimbinganCtrl@saveKkp']);
	Route::delete('/bimbingan/kkp/delete', 'Bimbingan\BimbinganCtrl@deleteKkp');

	# BIMBINGAN LAPORAN AKHIR
	Route::get('/bimbingan/laporanAkhir', 'Bimbingan\BimbinganCtrl@bimbinganLaporanAkhir');
	Route::get('/bimbingan/laporanAkhir/add', 'Bimbingan\BimbinganCtrl@addLaporanAkhir');
	Route::post('postBimbinganLaporanAkhir',['as'=>'postBimbinganLaporanAkhir','uses'=>'Bimbingan\BimbinganCtrl@CreateLaporanAkhir']);

	Route::get('/bimbingan/laporanAkhir/edit/{id_bimbingan_laporanAkhir}', 'Bimbingan\BimbinganCtrl@editLaporanAkhir');
	Route::put('putBimbinganLaporanAkhir',['as'=>'putBimbinganLaporanAkhir','uses'=>'Bimbingan\BimbinganCtrl@saveLaporanAkhir']);
	Route::delete('/bimbingan/laporanAkhir/delete', 'Bimbingan\BimbinganCtrl@deleteLaporanAkhir');


	Route::get('/bimbingan/laporanAkhir/detail/{id_bimbingan_laporanAkhir}', 'Bimbingan\BimbinganCtrl@detailLaporanAkhir');
	Route::get('/bimbingan/laporanAkhir/addDetail/{id_bimbingan_laporanAkhir}', 'Bimbingan\BimbinganCtrl@addLaporanAkhirDetail');
	Route::post('postBimbinganLaporanAkhirDetail',['as'=>'postBimbinganLaporanAkhirDetail','uses'=>'Bimbingan\BimbinganCtrl@CreateLaporanAkhirDetail']);

	Route::get('/bimbingan/laporanAkhir/editDetail/{id_bimbingan_laporanAkhir}', 'Bimbingan\BimbinganCtrl@editLaporanAkhirDetail');
	Route::put('putBimbinganLaporanAkhirDetail',['as'=>'putBimbinganLaporanAkhirDetail','uses'=>'Bimbingan\BimbinganCtrl@saveLaporanAkhirDetail']);
	Route::delete('/bimbingan/laporanAkhirDetail/delete', 'Bimbingan\BimbinganCtrl@deleteLaporanAkhirDetail');

	# PENGUJI UJIAN AKHIR
	Route::get('/pengujian', 'PelaksanaanPendidikan\PengujiCtrl@pengujiUjianAkhir');
	Route::get('/pengujian/add', 'PelaksanaanPendidikan\PengujiCtrl@add');
	Route::post('postPengujiUjianAkhir',['as'=>'postPengujiUjianAkhir','uses'=>'PelaksanaanPendidikan\PengujiCtrl@Create']);

	Route::get('/pengujian/edit/{id}', 'PelaksanaanPendidikan\PengujiCtrl@edit');
	Route::put('putPengujian',['as'=>'putPengujian','uses'=>'PelaksanaanPendidikan\PengujiCtrl@save']);
	Route::delete('/pengujian/delete', 'PelaksanaanPendidikan\PengujiCtrl@drop');


	Route::get('/pengujian/detail/{id}', 'PelaksanaanPendidikan\PengujiCtrl@detail');
	Route::get('/pengujian/detail/add/{id}', 'PelaksanaanPendidikan\PengujiCtrl@addMahasiswa');
	Route::post('postPengujianMahasiswa',['as'=>'postPengujianMahasiswa','uses'=>'PelaksanaanPendidikan\PengujiCtrl@CreateMahasiswa']);

	Route::get('/pengujian/detail/edit/{id}', 'PelaksanaanPendidikan\PengujiCtrl@editMahasiswa');
	Route::put('putPengujianMahasiswa',['as'=>'putPengujianMahasiswa','uses'=>'PelaksanaanPendidikan\PengujiCtrl@saveMahasiswa']);
	Route::delete('/pengujian/detail/delete', 'PelaksanaanPendidikan\PengujiCtrl@dropMahasiswa');

	# MEMBINA KEGIATAN MAHASISWA
	Route::get('/kegiatan/mahasiswa', 'Kegiatan\KegiatanCtrl@index');
	Route::get('/kegiatan/mahasiswa/add', 'Kegiatan\KegiatanCtrl@add');
	Route::post('postKegiatan',['as'=>'postKegiatan','uses'=>'Kegiatan\KegiatanCtrl@Create']);

	Route::get('/kegiatan/mahasiswa/edit/{id}', 'Kegiatan\KegiatanCtrl@edit');
	Route::put('putKegiatan',['as'=>'putKegiatan','uses'=>'Kegiatan\KegiatanCtrl@save']);
	Route::delete('/kegiatan/mahasiswa/delete', 'Kegiatan\KegiatanCtrl@drop');

	# MENGEMBANGKAN PROGRAM KULIAH
	Route::get('/program/kuliah', 'Program\ProgramCtrl@index');
	Route::get('/program/kuliah/add', 'Program\ProgramCtrl@add');
	Route::post('postProgramKuliah',['as'=>'postProgramKuliah','uses'=>'Program\ProgramCtrl@Create']);

	Route::get('/program/kuliah/edit/{id}', 'Program\ProgramCtrl@edit');
	Route::put('putProgramKuliah',['as'=>'putProgramKuliah','uses'=>'Program\ProgramCtrl@save']);
	Route::delete('/program/kuliah/delete', 'Program\ProgramCtrl@drop');

	# MENGEMBANGKAN BAHAN PENGAJARAN
	Route::get('/bahan/pengajaran', 'BahanPengajaran\BahanPengajaranCtrl@index');
	Route::get('/bahan/pengajaran/add', 'BahanPengajaran\BahanPengajaranCtrl@add');
	Route::post('postBahanPengajaran',['as'=>'postBahanPengajaran','uses'=>'BahanPengajaran\BahanPengajaranCtrl@Create']);

	Route::get('/bahan/pengajaran/edit/{id}', 'BahanPengajaran\BahanPengajaranCtrl@edit');
	Route::put('putBahanPengajaran',['as'=>'putBahanPengajaran','uses'=>'BahanPengajaran\BahanPengajaranCtrl@save']);
	Route::delete('/bahan/pengajaran/delete', 'BahanPengajaran\BahanPengajaranCtrl@drop');

	# MENGEMBANGKAN JABATAN PIMPINAN
	Route::get('/pendidikan/jabatan', 'PelaksanaanPendidikan\JabatanPimpinanCtrl@index');
	Route::get('/pendidikan/jabatan/add', 'PelaksanaanPendidikan\JabatanPimpinanCtrl@add');
	Route::post('postPendidikanJabatan',['as'=>'postPendidikanJabatan','uses'=>'PelaksanaanPendidikan\JabatanPimpinanCtrl@create']);
	Route::get('/pendidikan/jabatan/edit/{id}', 'PelaksanaanPendidikan\JabatanPimpinanCtrl@edit');
	Route::put('putPendidikanJabatan',['as'=>'putPendidikanJabatan','uses'=>'PelaksanaanPendidikan\JabatanPimpinanCtrl@save']);
	Route::delete('/pendidikan/jabatan/delete', 'PelaksanaanPendidikan\JabatanPimpinanCtrl@drop');

	# KEGIATAN PENGEMBANGAN
	Route::get('/pendidikan/pengembangan', 'PelaksanaanPendidikan\PengembanganCtrl@index');
	Route::get('/pendidikan/pengembangan/add', 'PelaksanaanPendidikan\PengembanganCtrl@add');
	Route::post('postPengembangan',['as'=>'postPengembangan','uses'=>'PelaksanaanPendidikan\PengembanganCtrl@create']);
	Route::get('/pendidikan/pengembangan/edit/{id}', 'PelaksanaanPendidikan\PengembanganCtrl@edit');
	Route::put('putPengembangan',['as'=>'putPengembangan','uses'=>'PelaksanaanPendidikan\PengembanganCtrl@save']);
	Route::delete('/pendidikan/pengembangan/delete', 'PelaksanaanPendidikan\PengembanganCtrl@drop');







															# PENGABDIAN DOSEN

	# PENGABDIAN A
	Route::get('/pengabdian/a', 'Pengabdian\PengabdianCtrl@index_A');
	Route::get('/pengabdian/a/add', 'Pengabdian\PengabdianCtrl@add_A');
	Route::post('postPengabdianA',['as'=>'postPengabdianA','uses'=>'Pengabdian\PengabdianCtrl@Create_A']);
	Route::get('/pengabdian/a/edit/{id}', 'Pengabdian\PengabdianCtrl@edit_A');
	Route::put('putPengabdianA',['as'=>'putPengabdianA','uses'=>'Pengabdian\PengabdianCtrl@save_A']);
	Route::delete('/pengabdian/a/delete', 'Pengabdian\PengabdianCtrl@drop_A');

	# PENGABDIAN B
	Route::get('/pengabdian/b', 'Pengabdian\PengabdianCtrl@index_B');
	Route::get('/pengabdian/b/add', 'Pengabdian\PengabdianCtrl@add_B');
	Route::post('postPengabdianB',['as'=>'postPengabdianB','uses'=>'Pengabdian\PengabdianCtrl@Create_B']);
	Route::get('/pengabdian/b/edit/{id}', 'Pengabdian\PengabdianCtrl@edit_B');
	Route::put('putPengabdianB',['as'=>'putPengabdianB','uses'=>'Pengabdian\PengabdianCtrl@save_B']);
	Route::delete('/pengabdian/b/delete', 'Pengabdian\PengabdianCtrl@drop_B');

	# PENGABDIAN C
	Route::get('/pengabdian/c', 'Pengabdian\PengabdianCtrl@index_C');
	Route::get('/pengabdian/c/add', 'Pengabdian\PengabdianCtrl@add_C');
	Route::post('postPengabdianC',['as'=>'postPengabdianC','uses'=>'Pengabdian\PengabdianCtrl@Create_C']);
	Route::get('/pengabdian/c/edit/{id}', 'Pengabdian\PengabdianCtrl@edit_C');
	Route::put('putPengabdianC',['as'=>'putPengabdianC','uses'=>'Pengabdian\PengabdianCtrl@save_C']);
	Route::delete('/pengabdian/c/delete', 'Pengabdian\PengabdianCtrl@drop_C');

	# PENGABDIAN D
	Route::get('/pengabdian/d', 'Pengabdian\PengabdianCtrl@index_D');
	Route::get('/pengabdian/d/add', 'Pengabdian\PengabdianCtrl@add_D');
	Route::post('postPengabdianD',['as'=>'postPengabdianD','uses'=>'Pengabdian\PengabdianCtrl@Create_D']);
	Route::get('/pengabdian/d/edit/{id}', 'Pengabdian\PengabdianCtrl@edit_D');
	Route::put('putPengabdianD',['as'=>'putPengabdianD','uses'=>'Pengabdian\PengabdianCtrl@save_D']);
	Route::delete('/pengabdian/d/delete', 'Pengabdian\PengabdianCtrl@drop_D');

	# PENGABDIAN E
	Route::get('/pengabdian/e', 'Pengabdian\PengabdianCtrl@index_E');
	Route::get('/pengabdian/e/add', 'Pengabdian\PengabdianCtrl@add_E');
	Route::post('postPengabdianE',['as'=>'postPengabdianE','uses'=>'Pengabdian\PengabdianCtrl@Create_E']);
	Route::get('/pengabdian/e/edit/{id}', 'Pengabdian\PengabdianCtrl@edit_E');
	Route::put('putPengabdianE',['as'=>'putPengabdianE','uses'=>'Pengabdian\PengabdianCtrl@save_E']);
	Route::delete('/pengabdian/e/delete', 'Pengabdian\PengabdianCtrl@drop_E');


															# PENUNJANG DOSEN

	# PENUNJANG A
	Route::get('/penunjang/a', 'Penunjang\PenunjangCtrl@index_A');
	Route::get('/penunjang/a/add', 'Penunjang\PenunjangCtrl@add_A');
	Route::post('postPenunjangA',['as'=>'postPenunjangA','uses'=>'Penunjang\PenunjangCtrl@Create_A']);
	Route::get('/penunjang/a/edit/{id}', 'Penunjang\PenunjangCtrl@edit_A');
	Route::put('putPenunjangA',['as'=>'putPenunjangA','uses'=>'Penunjang\PenunjangCtrl@save_A']);
	Route::delete('/penunjang/a/delete', 'Penunjang\PenunjangCtrl@drop_A');

	# PENUNJANG B
	Route::get('/penunjang/b', 'Penunjang\PenunjangCtrl@index_B');
	Route::get('/penunjang/b/add', 'Penunjang\PenunjangCtrl@add_B');
	Route::post('postPenunjangB',['as'=>'postPenunjangB','uses'=>'Penunjang\PenunjangCtrl@Create_B']);
	Route::get('/penunjang/b/edit/{id}', 'Penunjang\PenunjangCtrl@edit_B');
	Route::put('putPenunjangB',['as'=>'putPenunjangB','uses'=>'Penunjang\PenunjangCtrl@save_B']);
	Route::delete('/penunjang/b/delete', 'Penunjang\PenunjangCtrl@drop_B');

	# PENUNJANG C
	Route::get('/penunjang/c', 'Penunjang\PenunjangCtrl@index_C');
	Route::get('/penunjang/c/add', 'Penunjang\PenunjangCtrl@add_C');
	Route::post('postPenunjangC',['as'=>'postPenunjangC','uses'=>'Penunjang\PenunjangCtrl@Create_C']);
	Route::get('/penunjang/c/edit/{id}', 'Penunjang\PenunjangCtrl@edit_C');
	Route::put('putPenunjangC',['as'=>'putPenunjangC','uses'=>'Penunjang\PenunjangCtrl@save_C']);
	Route::delete('/penunjang/c/delete', 'Penunjang\PenunjangCtrl@drop_C');

	# PENUNJANG D
	Route::get('/penunjang/d', 'Penunjang\PenunjangCtrl@index_D');
	Route::get('/penunjang/d/add', 'Penunjang\PenunjangCtrl@add_D');
	Route::post('postPenunjangD',['as'=>'postPenunjangD','uses'=>'Penunjang\PenunjangCtrl@Create_D']);
	Route::get('/penunjang/d/edit/{id}', 'Penunjang\PenunjangCtrl@edit_D');
	Route::put('putPenunjangD',['as'=>'putPenunjangD','uses'=>'Penunjang\PenunjangCtrl@save_D']);
	Route::delete('/penunjang/d/delete', 'Penunjang\PenunjangCtrl@drop_D');

	# PENUNJANG E
	Route::get('/penunjang/e', 'Penunjang\PenunjangCtrl@index_E');
	Route::get('/penunjang/e/add', 'Penunjang\PenunjangCtrl@add_E');
	Route::post('postPenunjangE',['as'=>'postPenunjangE','uses'=>'Penunjang\PenunjangCtrl@Create_E']);
	Route::get('/penunjang/e/edit/{id}', 'Penunjang\PenunjangCtrl@edit_E');
	Route::put('putPenunjangE',['as'=>'putPenunjangE','uses'=>'Penunjang\PenunjangCtrl@save_E']);
	Route::delete('/penunjang/e/delete', 'Penunjang\PenunjangCtrl@drop_E');

	# PENUNJANG F
	Route::get('/penunjang/f', 'Penunjang\PenunjangCtrl@index_F');
	Route::get('/penunjang/f/add', 'Penunjang\PenunjangCtrl@add_F');
	Route::post('postPenunjangF',['as'=>'postPenunjangF','uses'=>'Penunjang\PenunjangCtrl@Create_F']);
	Route::get('/penunjang/f/edit/{id}', 'Penunjang\PenunjangCtrl@edit_F');
	Route::put('putPenunjangF',['as'=>'putPenunjangF','uses'=>'Penunjang\PenunjangCtrl@save_F']);
	Route::delete('/penunjang/f/delete', 'Penunjang\PenunjangCtrl@drop_F');

	# PENUNJANG G
	Route::get('/penunjang/g', 'Penunjang\PenunjangCtrl@index_G');
	Route::get('/penunjang/g/add', 'Penunjang\PenunjangCtrl@add_G');
	Route::post('postPenunjangG',['as'=>'postPenunjangG','uses'=>'Penunjang\PenunjangCtrl@Create_G']);
	Route::get('/penunjang/g/edit/{id}', 'Penunjang\PenunjangCtrl@edit_G');
	Route::put('putPenunjangG',['as'=>'putPenunjangG','uses'=>'Penunjang\PenunjangCtrl@save_G']);
	Route::delete('/penunjang/g/delete', 'Penunjang\PenunjangCtrl@drop_G');

	# PENUNJANG H
	Route::get('/penunjang/h', 'Penunjang\PenunjangCtrl@index_H');
	Route::get('/penunjang/h/add', 'Penunjang\PenunjangCtrl@add_H');
	Route::post('postPenunjangH',['as'=>'postPenunjangH','uses'=>'Penunjang\PenunjangCtrl@Create_H']);
	Route::get('/penunjang/h/edit/{id}', 'Penunjang\PenunjangCtrl@edit_H');
	Route::put('putPenunjangH',['as'=>'putPenunjangH','uses'=>'Penunjang\PenunjangCtrl@save_H']);
	Route::delete('/penunjang/h/delete', 'Penunjang\PenunjangCtrl@drop_H');

	# PENUNJANG I
	Route::get('/penunjang/i', 'Penunjang\PenunjangCtrl@index_I');
	Route::get('/penunjang/i/add', 'Penunjang\PenunjangCtrl@add_I');
	Route::post('postPenunjangI',['as'=>'postPenunjangI','uses'=>'Penunjang\PenunjangCtrl@Create_I']);
	Route::get('/penunjang/i/edit/{id}', 'Penunjang\PenunjangCtrl@edit_I');
	Route::put('putPenunjangI',['as'=>'putPenunjangI','uses'=>'Penunjang\PenunjangCtrl@save_I']);
	Route::delete('/penunjang/i/delete', 'Penunjang\PenunjangCtrl@drop_I');

	# PENUNJANG J
	Route::get('/penunjang/j', 'Penunjang\PenunjangCtrl@index_J');
	Route::get('/penunjang/j/add', 'Penunjang\PenunjangCtrl@add_J');
	Route::post('postPenunjangJ',['as'=>'postPenunjangJ','uses'=>'Penunjang\PenunjangCtrl@Create_J']);
	Route::get('/penunjang/j/edit/{id}', 'Penunjang\PenunjangCtrl@edit_J');
	Route::put('putPenunjangJ',['as'=>'putPenunjangJ','uses'=>'Penunjang\PenunjangCtrl@save_J']);
	Route::delete('/penunjang/j/delete', 'Penunjang\PenunjangCtrl@drop_J');




															# PENELITIAN

	# PENELITIAN B 
	Route::get('/penelitian/b/index', 'Penelitian\PenelitianBCtrl@index');
	Route::get('/penelitian/b/add', 'Penelitian\PenelitianBCtrl@add');
	Route::post('postPenelitianB',['as'=>'postPenelitianB','uses'=>'Penelitian\PenelitianBCtrl@create']);
	Route::get('/penelitian/b/edit/{id}', 'Penelitian\PenelitianBCtrl@edit');
	Route::put('putPenelitianB',['as'=>'putPenelitianB','uses'=>'Penelitian\PenelitianBCtrl@save']);
	Route::delete('/penelitian/b/delete', 'Penelitian\PenelitianBCtrl@drop');

	# PENELITIAN C 
	Route::get('/penelitian/c/index', 'Penelitian\PenelitianCCtrl@index');
	Route::get('/penelitian/c/add', 'Penelitian\PenelitianCCtrl@add');
	Route::post('postPenelitianC',['as'=>'postPenelitianC','uses'=>'Penelitian\PenelitianCCtrl@create']);
	Route::get('/penelitian/c/edit/{id}', 'Penelitian\PenelitianCCtrl@edit');
	Route::put('putPenelitianC',['as'=>'putPenelitianC','uses'=>'Penelitian\PenelitianCCtrl@save']);
	Route::delete('/penelitian/c/delete', 'Penelitian\PenelitianCCtrl@drop');

	# PENELITIAN D
	Route::get('/penelitian/d/index', 'Penelitian\PenelitianDCtrl@index');
	Route::get('/penelitian/d/add', 'Penelitian\PenelitianDCtrl@add');
	Route::post('postPenelitianD',['as'=>'postPenelitianD','uses'=>'Penelitian\PenelitianDCtrl@create']);
	Route::get('/penelitian/d/edit/{id}', 'Penelitian\PenelitianDCtrl@edit');
	Route::put('putPenelitianD',['as'=>'putPenelitianD','uses'=>'Penelitian\PenelitianDCtrl@save']);
	Route::delete('/penelitian/d/delete', 'Penelitian\PenelitianDCtrl@drop');

	# PENELITIAN E
	Route::get('/penelitian/e/index', 'Penelitian\PenelitianECtrl@index');
	Route::get('/penelitian/e/add', 'Penelitian\PenelitianECtrl@add');
	Route::post('postPenelitianE',['as'=>'postPenelitianE','uses'=>'Penelitian\PenelitianECtrl@create']);
	Route::get('/penelitian/e/edit/{id}', 'Penelitian\PenelitianECtrl@edit');
	Route::put('putPenelitianE',['as'=>'putPenelitianE','uses'=>'Penelitian\PenelitianECtrl@save']);
	Route::delete('/penelitian/e/delete', 'Penelitian\PenelitianECtrl@drop');


															# ADMIN PRODI
	# PAK
	Route::get('/PAK', 'PAK\PakCtrl@indexDosen');
	Route::get('/PAK/detail/{id}', 'PAK\PakCtrl@detailDosen');
	Route::get('/pak/a/prints/{id}/{nama}/{nip}/{pangkat}/{jabatan_fungsional}/{unit}/{tanggal_cetak}/{jabatan_truktural}',array('as'=>'pakAPrints','uses'=>'PAK\PakCtrl@Aprints'));
	Route::get('/pak/b/prints/{id}/{nama}/{nip}/{pangkat}/{jabatan_fungsional}/{unit}/{tanggal_cetak}/{jabatan_truktural}',array('as'=>'pakCPrints','uses'=>'PAK\PakCtrl@Bprints'));
	Route::get('/pak/c/prints/{id}/{nama}/{nip}/{pangkat}/{jabatan_fungsional}/{unit}/{tanggal_cetak}/{jabatan_truktural}',array('as'=>'pakCPrints','uses'=>'PAK\PakCtrl@Cprints'));
	Route::get('/pak/d/prints/{id}/{nama}/{nip}/{pangkat}/{jabatan_fungsional}/{unit}/{tanggal_cetak}/{jabatan_truktural}',array('as'=>'pakDPrints','uses'=>'PAK\PakCtrl@Dprints'));

	Route::get('/PAK/penanggung', 'PAK\PakCtrl@penanggung');
	Route::put('putPenanggung',['as'=>'putPenanggung','uses'=>'PAK\PakCtrl@updatePenanggung']);

	# DOSEN
	Route::get('/dosen', 'Dosen\DosenCtrl@index');
	Route::get('/dosen/add', 'Dosen\DosenCtrl@add');
	Route::post('postDosen',['as'=>'postDosen','uses'=>'Dosen\DosenCtrl@Create']);
	Route::get('/dosen/edit/{id}', 'Dosen\DosenCtrl@edit');
	Route::put('putDosen',['as'=>'putDosen','uses'=>'Dosen\DosenCtrl@save']);
	Route::delete('/dosen/delete', 'Dosen\DosenCtrl@drop');

															# ADMIN 
	# ADMIN PRODI
	Route::get('/admin/', 'AdminProdiCtrl@index');
	Route::get('/admin/add', 'AdminProdiCtrl@add');
	Route::post('postAdminProdi',['as'=>'postAdminProdi','uses'=>'AdminProdiCtrl@Create']);
	Route::get('/admin/edit/{id}', 'AdminProdiCtrl@edit');
	Route::put('putAdminProdi',['as'=>'putAdminProdi','uses'=>'AdminProdiCtrl@save']);
	Route::delete('/admin/delete', 'AdminProdiCtrl@drop');

	# PRODI
	Route::get('/prodi/', 'ProdiCtrl@index');
	Route::get('/prodi/add', 'ProdiCtrl@add');
	Route::post('postProdi',['as'=>'postProdi','uses'=>'ProdiCtrl@Create']);
	Route::get('/prodi/edit/{id}', 'ProdiCtrl@edit');
	Route::put('putProdi',['as'=>'putProdi','uses'=>'ProdiCtrl@save']);
	Route::delete('/prodi/delete', 'ProdiCtrl@drop');

	Route::get('/changePassword', 'Auth\ChangePassword@index');
	Route::put('putPassword',['as'=>'putPassword','uses'=>'Auth\ChangePassword@save']);

});

Route::get('/home', 'HomeCtrl@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

