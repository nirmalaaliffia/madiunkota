@extends('layouts.main')
<!-- ======= Hero Section ======= -->
@section('marque')
<marquee width="100%" direction="left">
           
            

<?php 
for ($i=0; $i < 3; $i++) { ?>
           
           <span style="color:#39FF14">
        
       <?php     echo "Agenda Terdekat : ".$agenda['data'][$i]['judul_rapat']." - ";
            echo $agenda['data'][$i]['lokasi_rapat']." - "; 
            echo date('d M Y H:i', strtotime($agenda["data"]["$i"]["mulai"] )); ?>
           </span> 
            
            &emsp;
           <img src="{{ asset('assets/img/Lambang_Kota_Madiun.png') }}" style="height:25px;width:25px;" alt="" class="img-fluid">
            &emsp;
         
           
  <?php     }
?>
</marquee>
@endsection
@section('container')
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
        <div class="whatsapp_float" style="position:fixed;bottom:40px;right20px;left0px;">
            
        </div>
        <img src="assets/img/THMNAIL.png">
        <h1>Website Resmi</h1>
        <h1>Pemerintah <span>Kota Madiun</span></h1>
        

        <a href="#services" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
    </div>
</section><!-- End Hero -->

<main id="main">


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                {{-- @dd($berita) --}}
                <h2>Menu Informasi</h2>

            </div>

            <div class="row">


                <a href="https://ppid.madiunkota.go.id/" target="_blank"
                    class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/ppid.jpg" class="card-img" alt="PPID">
                    </div>
                </a>


                <a href="https://docs.google.com/forms/d/e/1FAIpQLSccoegaoe1Ft8U41d2OkyCu6Y7YhBm68m0vZjfg4Ls51aUxpw/viewform"
                target="_blank" class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/layanan.jpg" class="card-img" alt="...">
                    </div>
                </a>

                <a href="https://kotamadiun.lapor.go.id/" target="_blank"
                    class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/lapor.id_.jpg" class="card-img" alt="...">
                    </div>
                </a>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/saber-pungli.jpg" class="card-img" alt="...">
                    </div>
                </div>

            </div>
            <br>
            <div class="row">


                <a href="http://lpse.madiunkota.go.id/" target="_blank"
                    class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/lpseslmtf-1.jpg" class="card-img" alt="...">
                    </div>
                </a>

                <a href="https://elhkpn.kpk.go.id/portal/user/pengumuman_lhkpn/YTNkaEt6UjBjMGxJT0RGR1JuVjVVWEJ5YTBGUE0wdFNlakEwU0ZoMVZYRkZaVWRaUlcxbVpWUkVSRUZTTUVKRk1tZHdNVkpJWjFOb1drVm1OV2N3VXc9PQ=="
                target="_blank" class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/elhkpn.png" class="card-img" alt="...">
                    </div>
                </a>

                <a href="https://sirup.lkpp.go.id/sirup/home/rekapKldi?idKldi=D179" target="_blank"
                    class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/sirup.jpg" class="card-img" alt="...">
                    </div>
                </a>

                <a href="https://ula.kemendagri.go.id/" target="_blank"
                    class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/SHIOLA.jpg" class="card-img" alt="...">
                    </div>
                </a>

            </div>

            <br>
            <div class="row">


                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/rlppd.jpg" class="card-img" alt="...">
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/opd.jpg" class="card-img" alt="...">
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/produk-huk.jpg" class="card-img" alt="...">
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/ormas.jpg" class="card-img" alt="...">
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= BERITA TERKINI Section ======= -->
    <section id="berita_terkini"  style="background-color:#f0f7fa;">
        <div class="container">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Berita Terkini</h2>

            </div>

            <div class="row">
                
                    <div class="col-sm-7 col-lg-9">

                        <div class="row">

                            @foreach ($berita_pinned as $bp)
                    
                    
                    
                            <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-3 mb-lg-0" style="padding-bottom:30px; padding-left:30px;">
                
                                <div class="card" style="width: 30rem;" data-aos="fade-in" data-aos-delay="100">
                                    <a href="/informasi/{{ $bp->id_berita }}">
                                     <?php   if($bp->path_foto == null){ ?>
                                    <img class="card-img-top" src="assets/img/PECELAND-LOGO-VECTOR-980x693.jpg"
                                        alt="Card image cap"> 
                                        <?php } else{ ?>
            
                                        <img class="card-img-top" src="{{asset("$bp->path_foto")}}"
                                        alt="Card image cap" style=" object-fit: cover;text-align: center;">
                                        <?php } ?>
                                    <div class="card-body">
                                        <hr>
                                        <h6 class="card-text">{{  $bp->judul }}</h6>
                                        <p  style="color:black;"> <small>by {{ $bp->name }} | {{ date('d M Y', strtotime($bp->created_at)) }} | {{ $bp->array_kategori }}</small> </p>
                                        <p class="btn btn-info position-absolute top-0 end-0" style="color:rgb(0, 0, 0); "> <i class="bx bxs-pin " style="color:black"></i> Pinned</p> 
                         
                                    </div>
                                </a>
                                </div>
                            </div>
               
                               
                                
                            @endforeach
                                @foreach ($berita as $berita)
                                
                                
                                
                                <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-3 mb-lg-0" style="padding-bottom:30px; padding-left:30px;">
                    
                                    <div class="card" style="width: 30rem;" data-aos="fade-in" data-aos-delay="100">
                                        <a href="/informasi/{{ $berita->id_berita }}">
                                         <?php   if($berita->path_foto == null){ ?>
                                        <img class="card-img-top" src="assets/img/PECELAND-LOGO-VECTOR-980x693.jpg"
                                            alt="Card image cap"> 
                                            <?php } else{ ?>
            
                                            <img class="card-img-top" src="{{asset("$berita->path_foto")}}"
                                            alt="Card image cap" style=" object-fit: cover;text-align: center;">
                                            <?php } ?>
                                        <div class="card-body">
                                            <hr>
                                            <h6 class="card-text">{{  $berita->judul }}</h6>
                                            <p  style="color:black;"> <small>by {{ $berita->name }} | {{ date('d M Y', strtotime($berita->created_at)) }} | {{ $berita->array_kategori }}</small> </p>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                   
                                   
                                    
                                @endforeach
                                
            
            
                               <a href="/berita"> <button class="btn btn-xs btn-info btn_view" style="border-radius: 20px;" >
                                    <i class="bx bx-grid-alt"></i> Berita Lainnya
                                </button></a>
            
                        </div>
                    </div>
                    <div class="col-5 col-lg-3" style="display: flex;">
                        <div style="width: 0px; height: 100%; border: 0.5px #000 solid;"> </div>&emsp;
    
                        <div class="card border-0" style="width: 18rem; height:20%">
                           
                            <!-- <script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script> -->

                            

                            <div id="gpr-kominfo-widget-container" data-aos="fade-in" data-aos-delay="100" style="min-width:300px; max-width:780px;best-width:500px "></div>
                         
                        </div>
    
    
    
                    </div>
               
            </div>

    </section><!-- End BERITA TERKINI Section -->




    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Instansi</h2>

            </div>


            <div id="accordion accordion-flush" "> 
        <table class=" table ">
    <tbody>        <tr>
            <td>
            <h2 class=" accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Organisasi Perangkat Daerah
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">

                        <strong>Dinas</strong>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <a target="_blank" href="http://disdik.madiunkota.go.id/" >Dinas Pendidikan</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="https://disbudparpora.madiunkota.go.id/">Dinas Kebudayaan, Pariwisata, Kepemudaan, dan Olahraga</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://dinsos.madiunkota.go.id/">Dinas Sosial, Pemberdayaan Perempuan, dan Perlindungan Anak</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://dinkes.madiunkota.go.id/">Dinas Kesehatan dan Keluarga Berencana</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://perdagangan.madiunkota.go.id/">Dinas Perdagangan</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://dpmptsp.madiunkota.go.id/">Dinas Penanaman Modal, PTSP</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://dpkp.madiunkota.go.id/">Dinas Perumahan dan Kawasan Pemukiman</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://putra.madiunkota.go.id/">Dinas Pekerjaan Umum dan Tata Ruang</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://disnaker.madiunkota.go.id/">Dinas Tenaga Kerja</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://dishub.madiunkota.go.id/">Dinas Perhubungan</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://disperta.madiunkota.go.id/">Dinas Pertanian dan Ketahanan Pangan</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://capil.madiunkota.go.id/">Dinas Kependudukan dan Pencatatan Sipil</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://kominfo.madiunkota.go.id/">Dinas Komunikasi dan Informatika</a></li>
                           
                          </ul>

                          <strong>Badan</strong>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item"> <a  target="_blank" href="https://bapenda.madiunkota.go.id/">Badan Pendapatan Daerah</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="http://bappeda.madiunkota.go.id/">Badan Perencanaan dan Pembangunan Daerah</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="https://bkad.madiunkota.go.id/">Badan Pengelolaan Keuangan dan Aset Daerah</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="http://bkpsdm.madiunkota.go.id/">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="https://bakesbangpol.madiunkota.go.id/">Badan Kesatuan Bangsa dan Politik</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="http://bpbd.madiunkota.go.id/">Badan Penanggulangan Bencana Daerah</a></li>
                            </ul>

                            <strong>Sekretariat Daerah Kota Madiun Asisten Pemerintah dan Pembangunan</strong>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> <a  target="_blank" href="https://pemerintahan.madiunkota.go.id/">Bagian Administrasi Pemerintahan Umum</a></li>
                                <li class="list-group-item"> <a  target="_blank" href="http://adbang.madiunkota.go.id/">Bagian Administrasi Pembangunan Bagian Hukum</a></li>
                    
                              </ul>

                              <strong>Asisten Pemerintah dan Pembangunan</strong>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item"> <a  target="_blank" href="https://ekokesra.madiunkota.go.id/">Bagian Administrasi Perekonomian dan Kesejahteraan Rakyat</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="http://organisasi.madiunkota.go.id/">Bagian Organisasi</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="https://umum.madiunkota.go.id/">Bagian Umum</a></li>
                            </ul>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item"> <strong><a target="_blank"  href="https://inspektorat.madiunkota.go.id/">Inspektorat Kota Madiun</a></strong></li>
                              <li class="list-group-item"> <strong><a target="_blank"  href="http://dprd.madiunkota.go.id/">DPRD Kota Madiun</a></strong></li>
                              <li class="list-group-item"> <strong><a  target="_blank" href="https://rsudsogaten.madiunkota.go.id/">Rumah Sakit Umum Daerah</a></strong></li>
                              <li class="list-group-item"> <strong><a  target="_blank" href="https://satpol.madiunkota.go.id/">Satuan Polisi Pamong Praja</a></strong></li>
                              <li class="list-group-item"> <strong><a  target="_blank" href="https://setdprd.madiunkota.go.id/">Sekertariat DPRD Kota Madiun</a></strong></li>
                            </ul>
                    </div>
                </div>
                </td>
                <td>
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Layanan Masyarakat
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <strong>Layanan Pengaduan</strong>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> <a  target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSccoegaoe1Ft8U41d2OkyCu6Y7YhBm68m0vZjfg4Ls51aUxpw/viewform">Form Pengaduan Masyarakat </a></li>
         
                             
                              </ul>
                              <strong>Layanan Informasi</strong>
                              <ul class="list-group list-group-flush">
                                  <li class="list-group-item"> <a  target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSf2OWl3ntyhZDpm_-H3i7CQy6CCYHkFUAZ7OSJg0inszxl7ew/viewform">Form Permohonan Informasi Publik </a></li>
                               
                                </ul>
                                <strong>Layanan Pendidikan</strong>
                              <ul class="list-group list-group-flush">
                                  <li class="list-group-item"> <a target="_blank"  href="http://disdik.madiunkota.go.id/">Dinas Pendidikan</a></li>
                                  <li class="list-group-item"><a  target="_blank" href="https://disbudparpora.madiunkota.go.id/">Dinas Kebudayaan, Pariwisata, Kepemudaan, dan Olahraga </a></li>
                                 
                                </ul>
                                <strong>Layanan Kesehatan</strong>
                              <ul class="list-group list-group-flush">
                                  <li class="list-group-item"> <a  target="_blank" href="http://dinkes.madiunkota.go.id/">Dinas Kesehatan dan Keluarga Berencana</a></li>
                                  <li class="list-group-item"><a  target="_blank" href="https://disbudparpora.madiunkota.go.id/">Dinas Kebudayaan, Pariwisata, Kepemudaan, dan Olahraga </a></li>
                                  <li class="list-group-item"><a  target="_blank" href="http://dinsos.madiunkota.go.id/">Dinas Sosial Pemberdayaan Perempuan dan Perlindungan Anak</a></li>
                                  <li class="list-group-item"><a  target="_blank" href="http://puskesmastawangrejo.madiunkota.go.id/">Puskesmas Tawangrejo</a></li>
                                  <li class="list-group-item"><a  target="_blank" href="http://puskesmasorooroombo.madiunkota.go.id/">Puskesmas Oro oro Ombo</a></li>
                                  <li class="list-group-item"><a  target="_blank" href="http://puskesmasngegong.madiunkota.go.id/">Puskesmas Ngegong</a></li>
                                  <li class="list-group-item"><a  target="_blank" href="http://puskesmasdemangan.madiunkota.go.id/">Puskesmas Demangan</a></li>
                                  <li class="list-group-item"><a  target="_blank" href="http://puskesmasmanguharjo.madiunkota.go.id/">Puskesmas Manguharjo</a></li>
                                  <li class="list-group-item"><a  target="_blank" href="http://puskesmasbanjarejo.madiunkota.go.id/">Puskesmas Banjarejo</a></li>
                               
                                </ul>
                                <strong>Layanan Perijinan</strong>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> <a  target="_blank" href="http://dpmptsp.madiunkota.go.id/">Dinas Penanaman Modal, PTSP, Koperasi dan Usana Mikro</a></li>
                                   
                                  </ul>
                        </div>
                    </div>
            </div>
            </td>
            <td>
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Kecamatan
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <strong><a target="_blank"  href="https://kecamatan-kartoharjo.madiunkota.go.id/">Kecamatan Kartoharjo </a></strong></li>
                            <li class="list-group-item"><strong><a  target="_blank" href="https://kecamatan-manguharjo.madiunkota.go.id/">Kecamatan Manguharjo</a></strong></li>
                            <li class="list-group-item"><strong><a target="_blank"  href="https://kecamatan-taman.madiunkota.go.id/">Kecamatan Taman</a></strong></li>
                            
                          </ul>    
                    </div>
                </div>
        </div>
        </td>

        <td>
            <h2 class="accordion-header" id="flush-headingfour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                    Link Terkait
                </button>
            </h2>
            <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                      
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <strong><a target="_blank"  href="https://madiuntoday.id/">@Madiuntoday </a></strong></li>
                        <li class="list-group-item"><strong><a  target="_blank" href="https://ekinerja.madiunkota.go.id/">E-Kinerja Kota Madiun </a></strong></li>
                        <li class="list-group-item"><strong><a  target="_blank" href="https://kotamadiun.jdih.jatimprov.go.id/">JDIH</a></strong></li>
                        <li class="list-group-item"><strong><a target="_blank"  href="https://madiunkota.bps.go.id/">BPS Kota Madiun</a></strong></li>
                        <li class="list-group-item"><strong><a  target="_blank" href="https://bankdaerah.madiunkota.go.id/">PD. BPR BANK DAERAH</a></strong></li>
                        <li class="list-group-item"><strong><a  target="_blank" href="http://umkm.madiunkota.go.id/">UMKM Kota Madiun</a></strong></li>
                        <li class="list-group-item"><strong><a  target="_blank" href="https://anekausaha.madiunkota.go.id/">PD. ANEKA USAHA</a></strong></li>
                        <li class="list-group-item"><strong><a  target="_blank" href="https://pdam.madiunkota.go.id/">PDAM Kota Madiun</a></strong></li>
                        <li class="list-group-item"><strong><a  target="_blank" href="https://ula.kemendagri.go.id/">SiOLA</a></strong></li>
                     
                      </ul>
                 
                </div>
            </div>
            </div>
        </td>
        </tr>

        <tr>
            <td>
                <h2 class=" accordion-header" id="flush-headingfive">
                    
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        Organisasi Masyarakat
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingfive"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong> <a  target="_blank" href="http://pkk.madiunkota.go.id/">PKK </a></strong></li>
                            <li class="list-group-item"><strong><a  target="_blank" href="https://baz.madiunkota.go.id/">Baznas Kota Madiun</a></strong></li>
                            <li class="list-group-item"><strong><a  target="_blank" href="http://gemmmass.madiunkota.go.id/">GEMMMAS</a></strong></li>
                            <li class="list-group-item"><strong><a  target="_blank" href="http://tkpk.madiunkota.go.id/">TKPK Kota Madiun</a></strong></li>
                         
                          </ul>
                     
                    </div>
                   
                </div>
            </td>
            <td>
                <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                        PPID
                    </button>
                </h2>
                <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <strong><a href="">PPID Utama </a></strong></li>
                            <li class="list-group-item"><strong><a  target="_blank" href="https://ppid.madiunkota.go.id/2020/07/21/transparansi-anggaran/">Transparansi anggaran</a></strong></li>
                         
                          </ul>    
                    </div>
                </div>
                </div>
            </td>
            <td>
                <h2 class="accordion-header" id="flush-headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                        Kelurahan
                    </button>
                </h2>
                <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <strong>Kecamatan Kartoharjo</strong>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <a target="_blank"  href="https://kelurahan-kartoharjo.madiunkota.go.id/">Kelurahan Kartoharjo</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-kanigoro.madiunkota.go.id/">Kelurahan Kanigoro</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://kelurahan-kelun.madiunkota.go.id/">Kelurahan Kelun</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-rejomulyo.madiunkota.go.id/">Kelurahan Rejomulyo</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://kelurahan-tawangrejo.madiunkota.go.id/">Kelurahan Tawangrejo</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="http://kelurahan-klegen.madiunkota.go.id/">Kelurahan Klegen</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-orooroombo.madiunkota.go.id/">Kelurahan Oro Oro Ombo</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-pilangbango.madiunkota.go.id/">Kelurahan Pilangbango</a></li>
                            <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-sukosari.madiunkota.go.id/">Kelurahan Sukosari</a></li>
                        
                          </ul>
                          <strong>Kecamatan Taman</strong>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item"> <a  target="_blank" href="http://kelurahan-taman.madiunkota.go.id/">Kelurahan Taman</a></li>
                              <li class="list-group-item"> <a target="_blank"  href="https://kelurahan-banjarejo.madiunkota.go.id/">Kelurahan Banjarejo</a></li>
                              <li class="list-group-item"> <a target="_blank"  href="https://kelurahan-demangan.madiunkota.go.id/">Kelurahan Demangan</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-kejuron.madiunkota.go.id/">Kelurahan Kejuron</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-josenan.madiunkota.go.id/">Kelurahan Josenan</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-pandean.madiunkota.go.id/">Kelurahan Pandean</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-manisrejo.madiunkota.go.id/">Kelurahan Manisrejo</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="http://kelurahan-mojorejo.madiunkota.go.id/">Kelurahan Mojorejo</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-kuncen.madiunkota.go.id/">Kelurahan Kuncen</a></li>
                            
                          
                            </ul>
                            <strong>Kecamatan Manguharjo</strong>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> <a target="_blank"  href="http://kelurahan-manguharjo.madiunkota.go.id/">Kelurahan Manguharjo</a></li>
                                <li class="list-group-item"> <a target="_blank"  href="https://kelurahan-pangongangan.madiunkota.go.id/">Kelurahan Pangongangan</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="http://kelurahan-madiunlor.madiunkota.go.id/">Kelurahan Madiun Lor</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="http://kelurahan-patihan.madiunkota.go.id/">Kelurahan Patihan</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-winongo.madiunkota.go.id/">Kelurahan Winongo</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-ngegong.madiunkota.go.id/">Kelurahan Ngegong</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="http://kelurahan-nambangankidul.madiunkota.go.id/">Kelurahan Nambangan Kidul</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="http://kelurahan-nambanganlor.madiunkota.go.id/">Kelurahan Nambangan Lor</a></li>
                              <li class="list-group-item"> <a  target="_blank" href="https://kelurahan-sogaten.madiunkota.go.id/">Kelurahan Kuncen</a></li>
                            
                              </ul>

                    </div>
                </div>
                </div>
            </td>

            <td>
                <h2 class="accordion-header" id="flush-headingEight">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                        Media Sosial
                    </button>
                </h2>
                <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content </div>
                </div>
                </div>
            </td>
        </tr>
        </tbody>
        </table>
        </div>


        </div>
    </section><!-- End Team Section -->

    <br> <br> <br>

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="text-center">
                <h3>Live Update Pemerintah Kota Madiun</h3>
                <img src="assets/img/THMNAIL.png"></img>
                <!-- <a class="cta-btn" href="#">Live Update Pemerintah Kota Madiun</a> -->
            </div>

        </div>
    </section><!-- End Cta Section -->



    <!-- ======= Tabloid Section ======= -->
    <section id="testimonials" class="testimonials section-bg" style="background-color:white;">
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Tabloid</h2>

            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                  

                    @foreach ($tabloid as $tabloid)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            @if ($tabloid->path_foto == null)
                            <img style="width: 20rem;"  class="card-img-top" src="assets/img/PECELAND-LOGO-VECTOR-980x693.jpg"
                            alt="Card image cap">
                            @else
                            <img   style="width: 20rem;"  class="card-img-top" src="{{asset("$tabloid->path_foto")}}"
                            alt="Card image cap">
                            @endif
                           
                       <hr>
                       <a href="/informasi/{{ $tabloid->id_berita }}"> <p style="color:black"> 
                                <strong>{{ $tabloid->judul }} <br> </strong><small>by {{ $tabloid->name }} | {{ date('d M Y', strtotime($tabloid->created_at)) }} </small>
                            </p></a>
                           
                        </div>
                    </div><!-- End testimonial item -->

                    @endforeach

                  

                 

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

<br>

    <!-- ======= Contact Section ======= -->
    {{-- <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                    sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                    ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Our Address</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email Us</h3>
                        <p>contact@example.com</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>Call Us</h3>
                        <p>+1 5589 55488 55</p>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                        frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section --> --}}

</main><!-- End #main -->
@endsection