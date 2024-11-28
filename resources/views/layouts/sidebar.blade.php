
<section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU UTAMA</li>
    
      <li class="{{ (request()->is('superadmin')) ? 'active' : '' }}"><a href="/superadmin"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
      
        <li class="{{ (request()->is('data/siswa*')) ? 'active' : '' }}"><a href="/data/siswa"><i class="fa fa-users"></i> <span>Data Penerima/Siswa</span></a></li>
        <li class="{{ (request()->is('data/kriteria*')) ? 'active' : '' }}"><a href="/data/kriteria"><i class="fa fa-list"></i> <span>Data Kriteria</span></a></li>
        <li class="{{ (request()->is('data/bkm')) ? 'active' : '' }}"><a href="/data/bkm"><i class="fa fa-list"></i> <span>Input BKM</span></a></li>
        <li class="{{ (request()->is('data/bkmp')) ? 'active' : '' }}"><a href="/data/bkmp"><i class="fa fa-list"></i> <span>Input BKMP</span></a></li>
        <li class="{{ (request()->is('data/wp/bkm')) ? 'active' : '' }}"><a href="/data/wp/bkm"><i class="fa fa-list"></i> <span>Proses WP BKM</span></a></li>
        <li class="{{ (request()->is('data/wp/bkmp')) ? 'active' : '' }}"><a href="/data/wp/bkmp"><i class="fa fa-list"></i> <span>Proses WP BKMP</span></a></li>
        <li class="{{ (request()->is('data/hasilbkm')) ? 'active' : '' }}"><a href="/data/hasilbkm"><i class="fa fa-list"></i> <span>Hasil BKM</span></a></li>
        <li class="{{ (request()->is('data/hasilbkmp')) ? 'active' : '' }}"><a href="/data/hasilbkmp"><i class="fa fa-list"></i> <span>Hasil BKMP</span></a></li>
        
        <li><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        
    </ul>
    
</section>