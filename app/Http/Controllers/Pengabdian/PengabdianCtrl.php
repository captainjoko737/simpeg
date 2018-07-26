<?php

namespace App\Http\Controllers\Pengabdian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserChecker;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Datatables;

class PengabdianCtrl extends Controller {

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENGABDIAN A - - - - - - - - - - - - - - - - - - - - #
    
    public function index_A() {

        $data['title'] = 'Menduduki Jabatan Pimpinan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('pengabdian')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'A')
        ->orderBy('id_pengabdian', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('pengabdian.a.index', $data);

    }

    public function add_A() {
                
        $data['title'] = 'Menduduki Jabatan Pimpinan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('pengabdian.a.add', $data);

    }

    public function Create_A(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;
            $request['angka_kredit'] = $request['volume_kegiatan'];

            $save = DB::table('pengabdian')->insert(
                [
                    'id_user' => $request->id_user, 
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

        return redirect('/pengabdian/a');  
    }

    public function edit_A($id) {

        $data['title'] = 'Menduduki Jabatan Pimpinan';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('pengabdian')
        ->where('id_pengabdian', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('pengabdian.a.edit', $data);
    }

    public function save_A(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;
                $request['angka_kredit'] = $request['volume_kegiatan'];

                $save = DB::table('pengabdian')
                            ->where('id_pengabdian', $request->id_pengabdian)
                            ->update([
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
                $request['angka_kredit'] = $request['volume_kegiatan'];

                $save = DB::table('pengabdian')
                            ->where('id_pengabdian', $request->id_pengabdian)
                            ->update([
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                        ]);
            }

        return redirect('/pengabdian/a');

    }

    public function drop_A(request $request) {
        $success = DB::table('pengabdian')->where('id_pengabdian', '=', $request->id_pengabdian)->delete();
    }


    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENGABDIAN B - - - - - - - - - - - - - - - - - - - - # 

    public function index_B() {

        $data['title'] = 'Melaksanakan Pengembangan Hasil Pendidikan dan Penelitian';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('pengabdian')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'B')
        ->orderBy('id_pengabdian', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('pengabdian.b.index', $data);

    }

    public function add_B() {
                
        $data['title'] = 'Melaksanakan Pengembangan Hasil Pendidikan dan Penelitian ';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('pengabdian.b.add', $data);

    }

    public function Create_B(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;
            $request['angka_kredit'] = $request['volume_kegiatan'];

            $save = DB::table('pengabdian')->insert(
                [
                    'id_user' => $request->id_user, 
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

        return redirect('/pengabdian/b');  
    }

    public function edit_B($id) {

        $data['title'] = 'Melaksanakan Pengembangan Hasil Pendidikan dan Penelitian ';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('pengabdian')
        ->where('id_pengabdian', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('pengabdian.b.edit', $data);
    }

    public function save_B(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;
                $request['angka_kredit'] = $request['volume_kegiatan'];

                $save = DB::table('pengabdian')
                            ->where('id_pengabdian', $request->id_pengabdian)
                            ->update([
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
                $request['angka_kredit'] = $request['volume_kegiatan'];

                $save = DB::table('pengabdian')
                            ->where('id_pengabdian', $request->id_pengabdian)
                            ->update([
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                        ]);
            }

        return redirect('/pengabdian/b');

    }

    public function drop_B(request $request) {
        $success = DB::table('pengabdian')->where('id_pengabdian', '=', $request->id_pengabdian)->delete();
    }



    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENGABDIAN C - - - - - - - - - - - - - - - - - - - - # 

    public function index_C() {

        $data['title'] = 'Memberi Latihan / Penyuluhan / Penataran / Ceramah pada Masyarakat';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('pengabdian')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'C')
        ->orderBy('id_pengabdian', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('pengabdian.c.index', $data);

    }

    public function add_C() {
                
        $data['title'] = 'Memberi Latihan / Penyuluhan / Penataran / Ceramah pada Masyarakat';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('pengabdian.c.add', $data);

    }

    public function Create_C(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;
            $request['angka_kredit'] = $request['volume_kegiatan'];

            $save = DB::table('pengabdian')->insert(
                [
                    'id_user' => $request->id_user, 
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

        return redirect('/pengabdian/c');  
    }

    public function edit_C($id) {

        $data['title'] = 'Memberi Latihan / Penyuluhan / Penataran / Ceramah pada Masyarakat';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('pengabdian')
        ->where('id_pengabdian', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('pengabdian.c.edit', $data);
    }

    public function save_C(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;
                $request['angka_kredit'] = $request['volume_kegiatan'];

                $save = DB::table('pengabdian')
                            ->where('id_pengabdian', $request->id_pengabdian)
                            ->update([
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
                $request['angka_kredit'] = $request['volume_kegiatan'];

                $save = DB::table('pengabdian')
                            ->where('id_pengabdian', $request->id_pengabdian)
                            ->update([
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                        ]);
            }

        return redirect('/pengabdian/c');

    }

    public function drop_C(request $request) {
        $success = DB::table('pengabdian')->where('id_pengabdian', '=', $request->id_pengabdian)->delete();
    }



    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENGABDIAN D - - - - - - - - - - - - - - - - - - - - # 

    public function index_D() {

        $data['title'] = 'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas umum';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('pengabdian')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'D')
        ->orderBy('id_pengabdian', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('pengabdian.d.index', $data);

    }

    public function add_D() {
                
        $data['title'] = 'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas umum';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('pengabdian.d.add', $data);

    }

    public function Create_D(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;
            $request['angka_kredit'] = $request['volume_kegiatan'];

            $save = DB::table('pengabdian')->insert(
                [
                    'id_user' => $request->id_user, 
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

        return redirect('/pengabdian/d');  
    }

    public function edit_D($id) {

        $data['title'] = 'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas umum';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('pengabdian')
        ->where('id_pengabdian', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('pengabdian.d.edit', $data);
    }

    public function save_D(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;
                $request['angka_kredit'] = $request['volume_kegiatan'];

                $save = DB::table('pengabdian')
                            ->where('id_pengabdian', $request->id_pengabdian)
                            ->update([
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
                $request['angka_kredit'] = $request['volume_kegiatan'];

                $save = DB::table('pengabdian')
                            ->where('id_pengabdian', $request->id_pengabdian)
                            ->update([
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                        ]);
            }

        return redirect('/pengabdian/d');

    }

    public function drop_D(request $request) {
        $success = DB::table('pengabdian')->where('id_pengabdian', '=', $request->id_pengabdian)->delete();
    }



    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - PENGABDIAN E - - - - - - - - - - - - - - - - - - - - # 

    public function index_E() {

        $data['title'] = 'Membuat / menulis karya pengabdian';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        $result = DB::table('pengabdian')
        ->where('id_user', '=', $id_user)
        ->where('kategori', '=', 'D')
        ->orderBy('id_pengabdian', 'DESC')
        ->get();

        $data['result'] = $result;

        // return $data;

        return view('pengabdian.e.index', $data);

    }

    public function add_E() {
                
        $data['title'] = 'Membuat / menulis karya pengabdian';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $data['id_user'] = $id_user;

        return view('pengabdian.e.add', $data);

    }

    public function Create_E(request $request) {

        // return $request->all();
        if ($request->file) {
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request['bukti_fisik']    = $fileName;
            $request['angka_kredit'] = $request['volume_kegiatan'];

            $save = DB::table('pengabdian')->insert(
                [
                    'id_user' => $request->id_user, 
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

        return redirect('/pengabdian/e');  
    }

    public function edit_E($id) {

        $data['title'] = 'Membuat / menulis karya pengabdian';

        $user = (new UserChecker)->checkUser(Auth::user());
        $data['user'] = $user;

        $id_user = Auth::user()->id_user;
        
        $result = DB::table('pengabdian')
        ->where('id_pengabdian', '=', $id)
        ->get();

        $data['result'] = $result[0];
        $data['id_user'] = $id_user;

        // return $data;

        return view('pengabdian.e.edit', $data);
    }

    public function save_E(request $request) {

        if ($request->file) {
                $fileName = time().'.'.$request->file->getClientOriginalExtension();
                $request['bukti_fisik']    = $fileName;
                $request['angka_kredit'] = $request['volume_kegiatan'];

                $save = DB::table('pengabdian')
                            ->where('id_pengabdian', $request->id_pengabdian)
                            ->update([
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
                $request['angka_kredit'] = $request['volume_kegiatan'];

                $save = DB::table('pengabdian')
                            ->where('id_pengabdian', $request->id_pengabdian)
                            ->update([
                                'nama_kegiatan' => $request->nama_kegiatan,
                                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                                'satuan_hasil' => $request->satuan_hasil,
                                'volume_kegiatan' => $request->volume_kegiatan,
                                'angka_kredit' => $request->angka_kredit,
                        ]);
            }

        return redirect('/pengabdian/e');

    }

    public function drop_E(request $request) {
        $success = DB::table('pengabdian')->where('id_pengabdian', '=', $request->id_pengabdian)->delete();
    }


}
