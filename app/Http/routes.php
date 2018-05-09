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
	
	Route::get('/profile/kepangkatan/add', 'Profile\KepangkatanCtrl@tambahKepangkatan');
	Route::post('postKepangkatan',['as'=>'postKepangkatan','uses'=>'Profile\KepangkatanCtrl@AddKepangkatan']);
	Route::get('/profile/kepangkatan/edit/{id_kepangkatan}', 'Profile\KepangkatanCtrl@editKepangkatan');
	Route::put('putKepangkatan',['as'=>'putKepangkatan','uses'=>'Profile\KepangkatanCtrl@SaveKepangkatan']);
	Route::delete('/profile/kepangkatan/delete', 'Profile\KepangkatanCtrl@deleteKepangkatan');

	Route::get('/profile/jabatanFungsional/add', 'Profile\JabatanFungsionalCtrl@tambahJabatanFungsional');
	Route::post('postJabatanFungsional',['as'=>'postJabatanFungsional','uses'=>'Profile\JabatanFungsionalCtrl@AddJabatanFungsional']);
	Route::get('/profile/jabatanFungsional/edit/{id_jabatanFungsional}', 'Profile\JabatanFungsionalCtrl@editJabatanFungsional');
	Route::put('putJabatanFungsional',['as'=>'putJabatanFungsional','uses'=>'Profile\JabatanFungsionalCtrl@SaveJabatanFungsional']);
	Route::delete('/profile/jabatanFungsional/delete', 'Profile\JabatanFungsionalCtrl@deleteJabatanFungsional');

	Route::get('/kualifikasi/pendidikanFormal/add', 'Kualifikasi\PendidikanFormalCtrl@tambahPendidikanFormal');
	Route::post('postPendidikanFormal',['as'=>'postPendidikanFormal','uses'=>'Kualifikasi\PendidikanFormalCtrl@AddPendidikanFormal']);
	Route::get('/Kualifikasi/pendidikanFormal/edit/{id_pendidikan_formal}', 'Kualifikasi\PendidikanFormalCtrl@editPendidikanFormal');
	Route::put('putPendidikanFormal',['as'=>'putPendidikanFormal','uses'=>'Kualifikasi\PendidikanFormalCtrl@SavePendidikanFormal']);
	Route::delete('/Kualifikasi/pendidikanFormal/delete', 'Kualifikasi\PendidikanFormalCtrl@deletePendidikanFormal');

	Route::get('/pengabdian/jabatanStruktural/add', 'Pengabdian\JabatanStrukturalCtrl@tambahJabatanStruktural');
	Route::post('postJabatanStruktural',['as'=>'postJabatanStruktural','uses'=>'Pengabdian\JabatanStrukturalCtrl@AddJabatanStruktural']);
	Route::get('/pengabdian/jabatanStruktural/edit/{id_jabatan_struktural}', 'Pengabdian\JabatanStrukturalCtrl@editJabatanStruktural');
	Route::put('putJabatanStruktural',['as'=>'putJabatanStruktural','uses'=>'Pengabdian\JabatanStrukturalCtrl@SaveJabatanStruktural']);
	Route::delete('/pengabdian/jabatanStruktural/delete', 'Pengabdian\JabatanStrukturalCtrl@deleteJabatanStruktural');

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


															# ADMIN 
	# PAK
	Route::get('/PAK', 'PAK\PakCtrl@indexDosen');
	Route::get('/PAK/detail/{id}', 'PAK\PakCtrl@detailDosen');

	# DOSEN
	Route::get('/dosen', 'Dosen\DosenCtrl@index');
	Route::get('/dosen/add', 'Dosen\DosenCtrl@add');
	Route::post('postPelaksanaanPendidikan',['as'=>'postPelaksanaanPendidikan','uses'=>'PelaksanaanPendidikan\PelaksanaanPendidikanCtrl@Create']);
	Route::get('/pelaksanaan/pendidikan/edit/{id_pelaksanaan_pendidikan}', 'PelaksanaanPendidikan\PelaksanaanPendidikanCtrl@edit');
	Route::put('putPelaksanaanPendidikan',['as'=>'putPelaksanaanPendidikan','uses'=>'PelaksanaanPendidikan\PelaksanaanPendidikanCtrl@save']);
	Route::delete('/pelaksanaan/pendidikan/delete', 'PelaksanaanPendidikan\PelaksanaanPendidikanCtrl@delete');

});

Route::get('/home', 'HomeCtrl@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

