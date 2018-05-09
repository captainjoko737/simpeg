
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center">
          <img src="{{ url('assets/image_assets/logo.png') }}" class="img-circle" alt="User Image">
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

        <li class="treeview {{ $user['menu_dosen'] }}">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Kopetensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Diklat</a></li> -->
            <li><a href="{{ url('/kopetensi/sertifikasi') }}"><i class="fa fa-circle-o"></i> Sertifikasi</a></li>
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
            <li><a href="{{ url('/penelitian/penelitian') }}"><i class="fa fa-circle-o"></i> Penelitian</a></li>
            <li><a href="{{ url('/penelitian/publikasiKarya') }}"><i class="fa fa-circle-o"></i> Publikasi Karya </a></li>
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
            <li class="active"><a href="{{ url('/pengabdian/jabatanStruktural') }}"><i class="fa fa-circle-o"></i> Jabatan Struktural</a></li>
          </ul>
        </li>

        <li class=" {{ $user['is_admin'] }}"><a href="{{ url('/dosen') }}"><i class="fa fa-mortar-board"></i> Dosen</a></li>
        <li class=" {{ $user['is_admin'] }}"><a href="{{ url('/PAK') }}"><i class="fa fa-book"></i> Layanan PAK</a></li>

        <li class="treeview {{ $user['menu_dosen'] }}">
          <a href="#">
            <i class="fa  fa-indent"></i> <span>Pelaks.Pendidikan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/pelaksanaan/pendidikan') }}"><i class="fa fa-circle-o"></i> Pelaks. Pendidikan</a></li>
            <li><a href="{{ url('/bimbingan/seminar') }}"><i class="fa fa-circle-o"></i> Bimbingan Seminar</a></li>
            <li><a href="{{ url('/bimbingan/kkp') }}"><i class="fa fa-circle-o"></i> Bimbingan KKP</a></li>
            <li><a href="{{ url('/bimbingan/laporanAkhir') }}"><i class="fa fa-circle-o"></i> Bimbingan Laporan Akhir</a></li>
            <li><a href="{{ url('/pengujian') }}"><i class="fa fa-circle-o"></i> Pengujian Mahasiswa</a></li>

            <li><a href="{{ url('/kegiatan/mahasiswa') }}"><i class="fa fa-circle-o"></i> Kegiatan Mahasiswa</a></li>
            <li><a href="{{ url('/program/kuliah') }}"><i class="fa fa-circle-o"></i> Program Kuliah</a></li>
            <li><a href="{{ url('/bahan/pengajaran') }}"><i class="fa fa-circle-o"></i> Bahan Pengajaran</a></li>
          </ul>
        </li>

        <li class="{{ Request::segment(1) === 'login' ? 'active' : '' }} {{ $user['is_login'] }}" ><a href="{{ url('/auth/login') }}"><i class="fa fa-lock"></i> <span>Login</span></a></li>
        <li class="{{ Request::segment(1) === 'logout' ? 'active' : '' }} {{ $user['is_logout'] }}" ><a href="{{ url('/auth/logout') }}"><i class="fa fa-lock"></i> <span>Ganti Password</span></a></li>
        <li class="{{ Request::segment(1) === 'logout' ? 'active' : '' }} {{ $user['is_logout'] }}" ><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>

  