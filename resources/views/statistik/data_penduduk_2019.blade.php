@extends('layouts.main')


@section('container')


<main id="main">
    

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" >
            <div class="row">
                <div class="col-sm-7 col-lg-9">
                  <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                    <h2>Data Penduduk 2019</h2>

                </div>
                    {{-- foreach berita --}}
                    @if ((count($stats)) != 0)
                    @foreach ($stats as $stats)
                    <h3> {{  $stats->judul }} </h3>
                    <p><small> By {{ $stats->name }} | {{ date('d M Y', strtotime($stats->created_at)) }} | {{ $stats->array_kategori }}</small> </p>
                    <br>
             
                    @if (  (count($stats_file)) != 0)
                    @foreach ($stats_file as $stats_file)
                        
                   
                    <div class="col">
                        <div class="card border-0" style="display:auto; text-align:center; align:center;">         
                          <iframe  src="{{asset("$stats_file->path_foto")}}" style="width:80%;height:600px;margin: 0 auto;"></iframe>
                          <div class="card-body">
                              <a href="/file-download/{{ $stats_file->id_berita }}" ><button type="button"  class="btn btn-xs btn-success" >
                                  <i class="bx bx-download"></i> Unduh File 
                              </button></a> <br>
                           
                          </div>
                        
                        </div>
                      </div>

                      @endforeach
                      @endif
                        <br>
                      <div class="col">
                        <div class="card border-0" style="display:auto; text-align:center; align:center;">         
                       
                          <div class="card-body">
                            <img style="display: block; margin-left: auto; margin-right: auto; width: 70%;"  src="{{asset("$stats->path_foto")}}"
                            alt="Card image cap">
                           
                          </div>
                        
                        </div>
                      </div>
                   
                      
                    
                   
                    
                   
                    <br>
                   <?php echo(stripslashes($stats->deskripsi));   ?> <br>

                {{-- foreach berita --}}
                    @endforeach
                    @endif
                </div> 
                <div class="col-5 col-lg-3" style="display: flex;">        <div style="width: 0px; height: 100%; border: 0.5px #000 solid;">
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
             

         
         

            <br> 
        </div>
    </section><!-- End Services Section -->


</main><!-- End #main -->

@endsection
