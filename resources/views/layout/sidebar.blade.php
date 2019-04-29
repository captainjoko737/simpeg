
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center">
          <img src="{{ url('/public/assets/image_assets/logo.png') }}" class="img-circle" alt="User Image">
        </div>
        
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ Request::segment(1) === 'home' ? 'active' : '' }}" ><a href="{{ url('/home') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li class="treeview {{ $user['menu_dosen'] }}">
          <a href="#">
            <i class="fa fa-user"></i> <span>Profil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('profile/dataPribadi') }}"><i class="fa fa-circle-o"></i> Data Pribadi</a></li>
            <li><a href="{{ url('profile/kepangkatan') }}"><i class="fa fa-circle-o"></i> Kepangkatan</a></li>
            <li><a href="{{ url('profile/jabatanFungsional') }}"><i class="fa fa-circle-o"></i> Jabatan Fungsional</a></li>
          </ul>
        </li>

        <li class="treeview {{ $user['menu_dosen'] }}">
          <a href="#">
            <i class="fa fa-mortar-board"></i> <span>Kualifikasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Diklat</a></li> -->
            <li><a href="{{ url('/kualifikasi/pendidikanFormal') }}"><i class="fa fa-circle-o"></i> Pendidikan Formal</a></li>
          </ul>
        </li>

        <!-- <li class="treeview {{ $user['menu_dosen'] }}">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Kopetensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Diklat</a></li>
            <li><a href="{{ url('/kopetensi/sertifikasi') }}"><i class="fa fa-circle-o"></i> Sertifikasi</a></li>
          </ul>
        </li> -->

        <li class="treeview {{ $user['menu_dosen'] }}">
          <a href="#">
            <i class="fa  fa-indent"></i> <span>Pelaks.Pendidikan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/pelaksanaan/pendidikan') }}"><i class="fa fa-circle-o"></i> A. Melaksanakan Perkuliahan</a></li>
            <li><a href="{{ url('/bimbingan/seminar') }}"><i class="fa fa-circle-o"></i> B. Membimbing Seminar</a></li>
            <li><a href="{{ url('/bimbingan/kkp') }}"><i class="fa fa-circle-o"></i> C. Membimbing KKP</a></li>
            <li><a href="{{ url('/bimbingan/laporanAkhir') }}"><i class="fa fa-circle-o"></i> D. Membimbing Skripsi</a></li>
            <li><a href="{{ url('/pengujian') }}"><i class="fa fa-circle-o"></i> E. Penguji Ujian Akhir</a></li>
            <li><a href="{{ url('/kegiatan/mahasiswa') }}"><i class="fa fa-circle-o"></i> F. Kegiatan Mahasiswa</a></li>
            <li><a href="{{ url('/program/kuliah') }}"><i class="fa fa-circle-o"></i> G. Program Kuliah</a></li>
            <li><a href="{{ url('/bahan/pengajaran') }}"><i class="fa fa-circle-o"></i> H. Bahan Pengajaran</a></li>
            <!-- <li class=""><a href="{{ url('/pendidikan/orasi') }}"><i class="fa fa-circle-o"></i> I. Orasi Ilmiah</a></li> -->
            <li class=""><a href="{{ url('/pendidikan/jabatan') }}"><i class="fa fa-circle-o"></i> J. Menduduki Jabatan</a></li>
            <li class=""><a href="{{ url('/pendidikan/pengembangan') }}"><i class="fa fa-circle-o"></i> M. Kegiatan Pengembangan</a></li>
          </ul>
        </li>

        <li class="treeview {{ $user['menu_dosen'] }}">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Pelaks.Penelitian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/penelitian/publikasiKarya') }}"><i class="fa fa-circle-o"></i>A. Menghasilkan Karya Ilmiah </a></li>
            <!-- <li><a href="{{ url('/penelitian/penelitian') }}"><i class="fa fa-circle-o"></i> Penelitian</a></li> -->
            <li><a href="{{ url('/penelitian/b/index') }}"><i class="fa fa-circle-o"></i>B. Menyadur Buku Ilmiah</a></li>
            <li><a href="{{ url('/penelitian/c/index') }}"><i class="fa fa-circle-o"></i>C. Menyunting Karya Ilmiah</a></li>
            <li><a href="{{ url('/penelitian/d/index') }}"><i class="fa fa-circle-o"></i>D. karya teknologi </a></li>
            <li><a href="{{ url('/penelitian/e/index') }}"><i class="fa fa-circle-o"></i>E. Rancangan Karya Seni</a></li>
          </ul>
        </li>

        <li class="treeview {{ $user['menu_dosen'] }}">
          <a href="#">
            <i class="fa fa-chain"></i> <span>Pelaks.Pengabdian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ url('/pengabdian/jabatanStruktural') }}"><i class="fa fa-circle-o"></i> Jabatan Struktural</a></li>
            <li class=""><a href="{{ url('/pengabdian/a') }}"><i class="fa fa-circle-o"></i> A. Jabatan Pimpinan</a></li>
            <li class=""><a href="{{ url('/pengabdian/b') }}"><i class="fa fa-circle-o"></i> B. Pengembangan Pendidikan</a></li>
            <li class=""><a href="{{ url('/pengabdian/c') }}"><i class="fa fa-circle-o"></i> C. Memberi Latihan</a></li>
            <li class=""><a href="{{ url('/pengabdian/d') }}"><i class="fa fa-circle-o"></i> D. Pelayanan Masyarakat</a></li>
            <li class=""><a href="{{ url('/pengabdian/e') }}"><i class="fa fa-circle-o"></i> E. Membuat Karya</a></li>
          </ul>
          
        </li>

        <li class="treeview {{ $user['menu_dosen'] }}">
          <a href="#">
            <i class="fa fa-balance-scale"></i> <span>Penunjang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ url('/penunjang/a') }}"><i class="fa fa-circle-o"></i> A. Badan Perguruan Tinggi</a></li>
            <li class=""><a href="{{ url('/penunjang/b') }}"><i class="fa fa-circle-o"></i> B. Badan Lembaga Pemerintah</a></li>
            <li class=""><a href="{{ url('/penunjang/c') }}"><i class="fa fa-circle-o"></i> C. Orasi Profesi</a></li>
            <li class=""><a href="{{ url('/penunjang/d') }}"><i class="fa fa-circle-o"></i> D. Mewakili Perguruan Tinggi</a></li>
            <li class=""><a href="{{ url('/penunjang/e') }}"><i class="fa fa-circle-o"></i> E. Pertemuan Internasional</a></li>
            <li class=""><a href="{{ url('/penunjang/f') }}"><i class="fa fa-circle-o"></i> F. Pertemuan ilmiah</a></li>
            <li class=""><a href="{{ url('/penunjang/g') }}"><i class="fa fa-circle-o"></i> G. Mendapat Penghargaan</a></li>
            <li class=""><a href="{{ url('/penunjang/h') }}"><i class="fa fa-circle-o"></i> H. Menulis Buku Pelajaran</a></li>
            <li class=""><a href="{{ url('/penunjang/i') }}"><i class="fa fa-circle-o"></i> I. Pristiwa Bidang Olahraga</a></li>
            <li class=""><a href="{{ url('/penunjang/j') }}"><i class="fa fa-circle-o"></i> J. Tim Penilaian</a></li>
          </ul>
          
        </li>

        <li class=" {{ $user['is_admin'] }}"><a href="{{ url('/dosen') }}"><i class="fa fa-mortar-board"></i> Dosen</a></li>
        <!-- <li class=" {{ $user['is_admin'] }}"><a href="{{ url('/PAK') }}"><i class="fa fa-book"></i> Layanan PAK</a></li> -->
        <li class=" {{ $user['is_admin'] }}"><a href="{{ url('/PAK') }}"><i class="fa fa-book"></i> Layanan PAK</a></li>

        <li class=" {{ $user['is_admin_prodi'] }}"><a href="{{ url('/dosen') }}"><i class="fa fa-mortar-board"></i> Dosen</a></li>
        <!-- <li class=" {{ $user['is_admin'] }}"><a href="{{ url('/PAK') }}"><i class="fa fa-book"></i> Layanan PAK</a></li> -->
        <li class=" {{ $user['is_admin_prodi'] }}"><a href="{{ url('/PAK') }}"><i class="fa fa-book"></i> Layanan PAK</a></li>

        
        <!-- <li class="{{ Request::segment(1) === 'logout' ? 'active' : '' }} {{ $user['is_logout'] }}" ><a href="{{ url('/prodi') }}"><i class="fa fa-question"></i> <span>Apendix</span></a></li> -->
        <li class="{{ Request::segment(1) === 'logout' ? 'active' : '' }} {{ $user['is_admin_prodi'] }}" ><a href="{{ url('/admin') }}"><i class="fa fa-users"></i> <span>Admin Prodi</span></a></li>
        <li class="{{ Request::segment(1) === 'logout' ? 'active' : '' }} {{ $user['is_admin_prodi'] }}" ><a href="{{ url('/prodi') }}"><i class="fa fa-flag"></i> <span>Prodi</span></a></li>

        <li class="{{ Request::segment(1) === 'login' ? 'active' : '' }} {{ $user['is_login'] }}" ><a href="{{ url('/auth/login') }}"><i class="fa fa-lock"></i> <span>Login</span></a></li>
        <li class="{{ Request::segment(1) === 'logout' ? 'active' : '' }} {{ $user['is_logout'] }}" ><a href="{{ url('/changePassword') }}"><i class="fa fa-lock"></i> <span>Ganti Password</span></a></li>
        <li class="{{ Request::segment(1) === 'logout' ? 'active' : '' }} {{ $user['is_logout'] }}" ><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>

  