@extends('layouts.main')


@section('container')


<main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
           <!-- ======= BERITA TERKINI Section ======= -->
    <section id="berita_terkini" >
        <div class="container">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Informasi</h2>

            </div>

            <div class="row">

                @if (count($berita) != 0)
                @foreach ($berita as $beritaItem)
                    
                    
                    
                <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-3 mb-lg-0" style="padding-bottom:30px; padding-left:30px;">
    
                    <div class="card" style="width: 30rem;" data-aos="fade-in" data-aos-delay="100">
                        <a href="/informasi/{{ $beritaItem->id_berita }}">
                            <?php   if($beritaItem->status_path == null){ ?>
                                <img class="card-img-top" src="assets/img/PECELAND-LOGO-VECTOR-980x693.jpg"
                                    alt="Card image cap"> 
                                    <?php } else if($beritaItem->status_path == 'link_portal'){ ?>
                                        <img class="card-img-top" src="{{ $beritaItem->path_foto  }}"
                                        alt="Card image cap" style=" object-fit: cover;text-align: center;">
                                 <?php   }else{ ?>
    
                                    <img class="card-img-top" src="{{asset("$beritaItem->path_foto")}}"
                                    alt="Card image cap" style=" object-fit: cover;text-align: center;">
                                    <?php } ?>
                        <div class="card-body">
                            <hr>
                            <h6 class="card-text">{{  $beritaItem->judul }}</h6>
                            <p  style="color:black;"> <small>by {{ $beritaItem->name }} | {{ date('d M Y', strtotime($beritaItem->created_at)) }} </small> </p>
                         
                           
                        </div>
                    </a>
                    </div>
                </div>
   
                   
                    
                @endforeach

                
                @else
                    <p style="text-align: center" data-aos="fade-in" data-aos-delay="200">Belum ada kegiatan pemkot</p>
                @endif
       
                    
               
            


            </div>
            {{ $berita->links() }}
    </section><!-- End BERITA TERKINI Section -->


        </div>
    </section><!-- End Services Section -->


</main><!-- End #main -->

@endsection
