    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        @yield('marque')
      
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
              
                <h1 class="text-light"><a href="/"><img src="{{ asset('assets/img/Lambang_Kota_Madiun.png') }}" alt="" class="img-fluid">&nbsp;<span>KOTA MADIUN</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
           
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <!-- <li><a class="nav-link scrollto active" href="#hero">Berita</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <li class="dropdown"><a href="#" style="{color: white; } :hover {color: #faed27}"  class="nav-link {{ ($parent === "berita") ? 'active':'' }}"><span>Berita</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/informasi">Informasi</a></li>                   
                            <li><a href="/kegiatan">Kegiatan Pemkot Madiun</a></li>
                            <li><a href="/pengumuman">Pengumuman</a></li>
                            <li><a href="/lowongan">Lowongan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="nav-link {{ ($parent === "arsip") ? 'active':'' }}"><span>Arsip</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/arsip/kegiatan_walikota">Kegiatan Walikota</a></li>                       
                            <li><a href="/arsip/tabloid">Tabloid Pemerintah Kota Madiun</a></li>
                            <li><a href="/arsip/dokumen">Dokumen</a></li>
                            <li><a href="/arsip/foto">Foto</a></li>
                            <li><a href="/arsip/video">Video</a></li>
                            <li><a href="https://jdih.madiunkota.go.id/" target="_blank">Produk Hukum</a></li>
                            <li><a href="/arsip/ipkd">IPKD</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="nav-link {{ ($parent === "profil") ? 'active':'' }}"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/profil/sejarah">Sejarah Kota Madiun</a></li>                        
                            <li><a href="/profil/visi_misi">Visi Misi Kota Madiun</a></li>
                            <li><a href="/profil/profil_pimpinan">Profil Pimpinan Daerah</a></li>
                            <li><a href="/profil/wilayah">Wilayah Geografis</a></li>
                            <li><a href="/profil/alamat">Daftar Alamat OPD Kota Madiun</a></li>
                            <li><a href="https://servicedesk.madiunkota.go.id/" target="_blank">Madiun Service Desk</a></li>
                            <li><a href="https://mail.madiunkota.go.id/" target="_blank">Email</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="nav-link {{ ($parent === "statistik") ? 'active':'' }}"><span>Data Statistik</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="https://dashboard.madiunkota.go.id/" target="_blank" >Data Sektoral</a></li>                
                            <li><a href="https://madiunkota.bps.go.id/" target="_blank" >BPS Kota Madiun</a></li>
                            <li><a href="/statistik/data_penduduk_2019" target="_blank">Data Penduduk Kota Madiun Tahun 2019</a></li>
                            <li><a href="https://hargapangan.id/" target="_blank">Tabel Harga Berdasarkan Daerah Harapanpangan.id</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link {{ ($parent === "jadwal_rapat") ? 'active':'' }}" href="/jadwal">Jadwal Rapat</a></li>
                    {{-- <li><a class="nav-link scrollto {{ ($parent === "kontak") ? 'active':'' }}" href="/#contact">Kontak</a></li> --}}
                   
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
                
            </nav><!-- .navbar -->
            
        </div>
       
    </header><!-- End Header -->