<?php

namespace App\Http\Controllers\Penunjang;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Datatables;

class PenunjangCtrl extends Controller {
    
    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENUNJANG A - - - - - - - - - - - - - - - - - - - - #
    
    public function index_A() {

        $data['title'] = 'Menjadi anggota dalam suatu panitia / Badan pada perguruan tinggi';
        $data['subtitle'] = 'Penunjang A';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('penunjang')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'A')
        ->orderBy('id_penunjang', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('penunjang.a.index', $data);

    }

    public function add_A() {
                
        $data['title'] = 'Menjadi anggota dalam suatu panitia / Badan pada perguruan tinggi';
        $data['subtitle'] = 'Penunjang A';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('penunjang.a.add', $data);

    }

    public function Create_A(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('penunjang')->insert(
                [
                    'id_user' => $request->id_user, 
                    'tingkat' => $request->tingkat,
                    'kategori' => $request->kategori, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal_kegiatan' => $request->tanggal_kegiatan,
                    'satuan_hasil' => $request->satuan_hasil,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'angka_kredit' => $request->angka_kredit,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
            }
        }

        return redirect('/penunjang/a');  
    }

    public function edit_A($id) {

        $data['title'] = 'Menjadi anggota dalam suatu panitia / Badan pada perguruan tinggi';
        $data['subtitle'] = 'Penunjang A';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penunjang')
        ->where('id_penunjang', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('penunjang.a.edit', $data);
    }

    public function save_A(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/penunjang/a');

    }

    public function drop_A(request $request) {
        $success = DB::table('penunjang')->where('id_penunjang', '=', $request->id_penunjang)->delete();
    }

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENUNJANG B - - - - - - - - - - - - - - - - - - - - #
    
    public function index_B() {

        $data['title'] = 'Menjadi anggota panitia / badan pada lembaga pemerintah';
        $data['subtitle'] = 'Penunjang B';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('penunjang')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'B')
        ->orderBy('id_penunjang', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('penunjang.b.index', $data);

    }

    public function add_B() {
                
        $data['title'] = 'Menjadi anggota panitia / badan pada lembaga pemerintah';
        $data['subtitle'] = 'Penunjang B';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('penunjang.b.add', $data);

    }

    public function Create_B(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('penunjang')->insert(
                [
                    'id_user' => $request->id_user, 
                    'tingkat' => $request->tingkat,
                    'kategori' => $request->kategori, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal_kegiatan' => $request->tanggal_kegiatan,
                    'satuan_hasil' => $request->satuan_hasil,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'angka_kredit' => $request->angka_kredit,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
            }
        }

        return redirect('/penunjang/a');  
    }

    public function edit_B($id) {

        $data['title'] = 'Menjadi anggota panitia / badan pada lembaga pemerintah';
        $data['subtitle'] = 'Penunjang B';
            
        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penunjang')
        ->where('id_penunjang', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('penunjang.b.edit', $data);
    }

    public function save_B(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/penunjang/b');

    }

    public function drop_B(request $request) {
        $success = DB::table('penunjang')->where('id_penunjang', '=', $request->id_penunjang)->delete();
    }

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENUNJANG C - - - - - - - - - - - - - - - - - - - - #
    
    public function index_C() {

        $data['title'] = 'Menjadi anggota organisasi profesi';
        $data['subtitle'] = 'Penunjang C';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('penunjang')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'C')
        ->orderBy('id_penunjang', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('penunjang.c.index', $data);

    }

    public function add_C() {
                
        $data['title'] = 'Menjadi anggota organisasi profesi';
        $data['subtitle'] = 'Penunjang C';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('penunjang.c.add', $data);

    }

    public function Create_C(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('penunjang')->insert(
                [
                    'id_user' => $request->id_user, 
                    'tingkat' => $request->tingkat,
                    'kategori' => $request->kategori, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal_kegiatan' => $request->tanggal_kegiatan,
                    'satuan_hasil' => $request->satuan_hasil,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'angka_kredit' => $request->angka_kredit,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
            }
        }

        return redirect('/penunjang/c');  
    }

    public function edit_C($id) {

        $data['title'] = 'Menjadi anggota organisasi profesi';
        $data['subtitle'] = 'Penunjang C';
            
        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penunjang')
        ->where('id_penunjang', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('penunjang.c.edit', $data);
    }

    public function save_C(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/penunjang/c');

    }

    public function drop_C(request $request) {
        $success = DB::table('penunjang')->where('id_penunjang', '=', $request->id_penunjang)->delete();
    }

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENUNJANG D - - - - - - - - - - - - - - - - - - - - #
    
    public function index_D() {

        $data['title'] = 'Mewakili perguruan tinggi / lembaga pemerintah';
        $data['subtitle'] = 'Penunjang D';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('penunjang')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'D')
        ->orderBy('id_penunjang', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('penunjang.d.index', $data);

    }

    public function add_D() {
                
        $data['title'] = 'Mewakili perguruan tinggi / lembaga pemerintah';
        $data['subtitle'] = 'Penunjang D';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('penunjang.d.add', $data);

    }

    public function Create_D(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('penunjang')->insert(
                [
                    'id_user' => $request->id_user, 
                    'tingkat' => $request->tingkat,
                    'kategori' => $request->kategori, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal_kegiatan' => $request->tanggal_kegiatan,
                    'satuan_hasil' => $request->satuan_hasil,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'angka_kredit' => $request->angka_kredit,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
            }
        }

        return redirect('/penunjang/d');  
    }

    public function edit_D($id) {

        $data['title'] = 'Mewakili perguruan tinggi / lembaga pemerintah';
        $data['subtitle'] = 'Penunjang D';
            
        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penunjang')
        ->where('id_penunjang', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('penunjang.d.edit', $data);
    }

    public function save_D(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/penunjang/d');

    }

    public function drop_D(request $request) {
        $success = DB::table('penunjang')->where('id_penunjang', '=', $request->id_penunjang)->delete();
    }

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENUNJANG E - - - - - - - - - - - - - - - - - - - - #
    
    public function index_E() {

        $data['title'] = 'Menjadi anggota delegasi nasional ke pertemuan internasional';
        $data['subtitle'] = 'Penunjang E';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('penunjang')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'E')
        ->orderBy('id_penunjang', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('penunjang.e.index', $data);

    }

    public function add_E() {
                
        $data['title'] = 'Menjadi anggota delegasi nasional ke pertemuan internasional';
        $data['subtitle'] = 'Penunjang E';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('penunjang.e.add', $data);

    }

    public function Create_E(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('penunjang')->insert(
                [
                    'id_user' => $request->id_user, 
                    'tingkat' => $request->tingkat,
                    'kategori' => $request->kategori, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal_kegiatan' => $request->tanggal_kegiatan,
                    'satuan_hasil' => $request->satuan_hasil,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'angka_kredit' => $request->angka_kredit,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
            }
        }

        return redirect('/penunjang/e');  
    }

    public function edit_E($id) {

        $data['title'] = 'Menjadi anggota delegasi nasional ke pertemuan internasional';
        $data['subtitle'] = 'Penunjang E';
            
        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penunjang')
        ->where('id_penunjang', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('penunjang.e.edit', $data);
    }

    public function save_E(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/penunjang/e');

    }

    public function drop_E(request $request) {
        $success = DB::table('penunjang')->where('id_penunjang', '=', $request->id_penunjang)->delete();
    }

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENUNJANG F - - - - - - - - - - - - - - - - - - - - #
    
    public function index_F() {

        $data['title'] = 'Berperan serta aktif dalam pertemuan ilmiah';
        $data['subtitle'] = 'Penunjang F';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('penunjang')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'F')
        ->orderBy('id_penunjang', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('penunjang.f.index', $data);

    }

    public function add_F() {
                
        $data['title'] = 'Berperan serta aktif dalam pertemuan ilmiah';
        $data['subtitle'] = 'Penunjang F';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('penunjang.f.add', $data);

    }

    public function Create_F(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('penunjang')->insert(
                [
                    'id_user' => $request->id_user, 
                    'tingkat' => $request->tingkat,
                    'kategori' => $request->kategori, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal_kegiatan' => $request->tanggal_kegiatan,
                    'satuan_hasil' => $request->satuan_hasil,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'angka_kredit' => $request->angka_kredit,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
            }
        }

        return redirect('/penunjang/f');  
    }

    public function edit_F($id) {

        $data['title'] = 'Berperan serta aktif dalam pertemuan ilmiah';
        $data['subtitle'] = 'Penunjang F';
            
        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penunjang')
        ->where('id_penunjang', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('penunjang.f.edit', $data);
    }

    public function save_F(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/penunjang/f');

    }

    public function drop_F(request $request) {
        $success = DB::table('penunjang')->where('id_penunjang', '=', $request->id_penunjang)->delete();
    }

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENUNJANG G - - - - - - - - - - - - - - - - - - - - #
    
    public function index_G() {

        $data['title'] = 'Mendapat penghargaan / tanda jasa';
        $data['subtitle'] = 'Penunjang G';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('penunjang')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'G')
        ->orderBy('id_penunjang', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('penunjang.g.index', $data);

    }

    public function add_G() {
                
        $data['title'] = 'Mendapat penghargaan / tanda jasa';
        $data['subtitle'] = 'Penunjang G';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('penunjang.g.add', $data);

    }

    public function Create_G(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('penunjang')->insert(
                [
                    'id_user' => $request->id_user, 
                    'tingkat' => $request->tingkat,
                    'kategori' => $request->kategori, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal_kegiatan' => $request->tanggal_kegiatan,
                    'satuan_hasil' => $request->satuan_hasil,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'angka_kredit' => $request->angka_kredit,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
            }
        }

        return redirect('/penunjang/g');  
    }

    public function edit_G($id) {

        $data['title'] = 'Mendapat penghargaan / tanda jasa';
        $data['subtitle'] = 'Penunjang G';
            
        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penunjang')
        ->where('id_penunjang', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('penunjang.g.edit', $data);
    }

    public function save_G(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/penunjang/g');

    }

    public function drop_G(request $request) {
        $success = DB::table('penunjang')->where('id_penunjang', '=', $request->id_penunjang)->delete();
    }

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENUNJANG H - - - - - - - - - - - - - - - - - - - - #
    
    public function index_H() {

        $data['title'] = 'Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional';
        $data['subtitle'] = 'Penunjang H';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('penunjang')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'H')
        ->orderBy('id_penunjang', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('penunjang.h.index', $data);

    }

    public function add_H() {
                
        $data['title'] = 'Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional';
        $data['subtitle'] = 'Penunjang H';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('penunjang.h.add', $data);

    }

    public function Create_H(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('penunjang')->insert(
                [
                    'id_user' => $request->id_user, 
                    'tingkat' => $request->tingkat,
                    'kategori' => $request->kategori, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal_kegiatan' => $request->tanggal_kegiatan,
                    'satuan_hasil' => $request->satuan_hasil,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'angka_kredit' => $request->angka_kredit,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
            }
        }

        return redirect('/penunjang/h');  
    }

    public function edit_H($id) {

        $data['title'] = 'Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional';
        $data['subtitle'] = 'Penunjang H';
            
        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penunjang')
        ->where('id_penunjang', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('penunjang.h.edit', $data);
    }

    public function save_H(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/penunjang/h');

    }

    public function drop_H(request $request) {
        $success = DB::table('penunjang')->where('id_penunjang', '=', $request->id_penunjang)->delete();
    }

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENUNJANG I - - - - - - - - - - - - - - - - - - - - #
    
    public function index_I() {

        $data['title'] = 'Mempunyai prestasi di bidang olahraga / humaniora';
        $data['subtitle'] = 'Penunjang I';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('penunjang')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'I')
        ->orderBy('id_penunjang', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('penunjang.i.index', $data);

    }

    public function add_I() {
                
        $data['title'] = 'Mempunyai prestasi di bidang olahraga / humaniora';
        $data['subtitle'] = 'Penunjang I';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('penunjang.i.add', $data);

    }

    public function Create_I(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('penunjang')->insert(
                [
                    'id_user' => $request->id_user, 
                    'tingkat' => $request->tingkat,
                    'kategori' => $request->kategori, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal_kegiatan' => $request->tanggal_kegiatan,
                    'satuan_hasil' => $request->satuan_hasil,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'angka_kredit' => $request->angka_kredit,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
            }
        }

        return redirect('/penunjang/i');  
    }

    public function edit_I($id) {

        $data['title'] = 'Mempunyai prestasi di bidang olahraga / humaniora';
        $data['subtitle'] = 'Penunjang I';
            
        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penunjang')
        ->where('id_penunjang', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('penunjang.i.edit', $data);
    }

    public function save_I(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/penunjang/i');

    }

    public function drop_I(request $request) {
        $success = DB::table('penunjang')->where('id_penunjang', '=', $request->id_penunjang)->delete();
    }

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENUNJANG J - - - - - - - - - - - - - - - - - - - - #
    
    public function index_J() {

        $data['title'] = 'Keanggotaan dalam tim penilaian';
        $data['subtitle'] = 'Penunjang J';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('penunjang')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'J')
        ->orderBy('id_penunjang', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('penunjang.j.index', $data);

    }

    public function add_J() {
                
        $data['title'] = 'Keanggotaan dalam tim penilaian';
        $data['subtitle'] = 'Penunjang J';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('penunjang.j.add', $data);

    }

    public function Create_J(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;

            $save = DB::table('penunjang')->insert(
                [
                    'id_user' => $request->id_user, 
                    'tingkat' => $request->tingkat,
                    'kategori' => $request->kategori, 
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'tanggal_kegiatan' => $request->tanggal_kegiatan,
                    'satuan_hasil' => $request->satuan_hasil,
                    'volume_kegiatan' => $request->volume_kegiatan,
                    'angka_kredit' => $request->angka_kredit,
                    'bukti_fisik_desc' => $request->bukti_fisik_desc,
                    'bukti_fisik' => $request->bukti_fisik
                ]
            );

            if ($save) {
                if ($request->file) {
                    $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                }
            }
        }

        return redirect('/penunjang/j');  
    }

    public function edit_J($id) {

        $data['title'] = 'Keanggotaan dalam tim penilaian';
        $data['subtitle'] = 'Penunjang J';
            
        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('penunjang')
        ->where('id_penunjang', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('penunjang.j.edit', $data);
    }

    public function save_J(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc,
                                'bukti_fisik' => $request->bukti_fisik
                            ]);

                if ($save) {
                    if ($request->file) {
                        $request->file->move(base_path().'/public/assets/bukti_fisik/', $fileName);
                    }
                }
            }else{

                $save = DB::table('penunjang')
                            ->where('id_penunjang', $request->id_penunjang)
                            ->update([
                                'tingkat' => $request->tingkat,
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                                'bukti_fisik_desc' => $request->bukti_fisik_desc
                        ]);
            }

        return redirect('/penunjang/j');

    }

    public function drop_J(request $request) {
        $success = DB::table('penunjang')->where('id_penunjang', '=', $request->id_penunjang)->delete();
    }

}
