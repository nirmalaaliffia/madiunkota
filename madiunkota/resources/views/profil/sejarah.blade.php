@extends('layouts.main')


@section('container')


<main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <!-- ======= BERITA TERKINI Section ======= -->
            <section id="berita_terkini">
                <div class="container">
                   

                    <div class="row">
                        <div class="col-sm-7 col-lg-9">
                            {{-- foreach berita --}}
                            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                                <h2>Sejarah Kota Madiun</h2>
        
                            </div>
                            @foreach ($profil as $profil)
                         

                            @if ( $profil->deskripsi != null)

                            <div class="col">
                                <?php echo(stripslashes($profil->deskripsi));   ?> <br>
                            </div>
                            @else
                            <p style="text-align: center" data-aos="fade-in" data-aos-delay="200">Sejarah belum diisi</p>
                            @endif

                            <br>


                            {{-- foreach berita --}}
                            @endforeach
                        </div>
                        <div class="col-5 col-lg-3" style="display: flex;">
                            <div style="width: 0px; height: 100%; border: 0.5px #000 solid;">
                            </div>&emsp; 
                            <div class="card border-0" style="width: 18rem; height:20%">
                                <div class="card-body border-0">
                                   
                                        <img src="{{ asset('assets/img/logo.png') }}" class="card-img" alt="...">    
                                    
                                        Call Center :
                                        081 249 83 1266
                                </div>
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item border-0"> <a href="https://www.lapor.go.id/" target="_blank">
                                    <img src="{{ asset('assets/img/lapor.png') }}" class="card-img" alt="...">    
                                    </a></li>
                                  <li class="list-group-item border-0">Link</li>
                                  <li class="list-group-item border-0"><a href="https://sirup.lkpp.go.id/sirup/home/rekapKldi?idKldi=D179" target="_blank">
                                    <img src="{{ asset('assets/img/sirup.png') }}" class="card-img" alt="...">    
                                    </a></li>
                                  <li class="list-group-item border-0"><a href="http://lpse.madiunkota.go.id/" target="_blank">
                                    <img src="{{ asset('assets/img/lpse.png') }}" class="card-img" alt="...">    
                                    </a></li>
                                  <li class="list-group-item border-0"><a href="/profil/alamat" target="_blank">
                                    <img src="{{ asset('assets/img/aervyt.png') }}" class="card-img" alt="...">    
                                    </a></li>
                                </ul>
                                
                              </div>
                        </div>
                    </div>





                    <br>

            </section><!-- End BERITA TERKINI Section -->


        </div>
    </section><!-- End Services Section -->


</main><!-- End #main -->

@endsection
