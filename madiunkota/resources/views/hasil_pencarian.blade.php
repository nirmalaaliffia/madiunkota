@extends('layouts.main')


@section('container')


<main id="main">


    <!-- Default box -->



    <!-- ======= BERITA TERKINI Section ======= -->
    <section id="berita_terkini" style="background-color:#f0f7fa;">
        <div class="container">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Hasil Pencarian Berita</h2>
                
            </div>

            <div class="row">

                <div class="col-sm-12 col-lg-12">

                    <div class="row">

                    
                        @foreach ($beritas as $berita)



                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-3 mb-lg-0"
                            style="padding-bottom:30px; padding-left:30px;">

                            <div class="card" style="width: 30rem;" data-aos="fade-in" data-aos-delay="100">
                                <a href="/informasi/{{ $berita->id_berita }}">
                                    <?php   if($berita->status_path == null){ ?>
                                    <img class="card-img-top" src="assets/img/PECELAND-LOGO-VECTOR-980x693.jpg"
                                        alt="Card image cap">
                                    <?php } else if($berita->status_path == 'link_portal'){ ?>
                                    <img class="card-img-top" src="{{ $berita->path_foto  }}" alt="Card image cap"
                                        style=" object-fit: cover;text-align: center;">
                                    <?php   }else{ ?>

                                    <img class="card-img-top" src="{{asset("$berita->path_foto")}}" alt="Card image cap"
                                        style=" object-fit: cover;text-align: center;">
                                    <?php } ?>
                                    <div class="card-body">
                                        <hr>
                                        <h6 class="card-text">{{  $berita->judul }}</h6>
                                        <p style="color:black;"> <small>by {{ $berita->name }} |
                                                {{ date('d M Y', strtotime($berita->created_at)) }} |
                                                {{ $berita->array_kategori }}</small> </p>
                                    </div>
                                </a>
                            </div>
                        </div>



                        @endforeach




                    </div>
                </div>
                {{-- <br>  <div  class="text-center" style="display: flex; justify-content: center;">{{ $beritas->links() }}</div> --}}

            </div>

    </section><!-- End BERITA TERKINI Section -->





</main><!-- End #main -->

@endsection


@push('script')


<script ttype="text/javascript">
    $(document).ready(function () {
        $('#jadwal_rapat').DataTable({
            scrollY: '50vh',
            scrollCollapse: true,
            paging: true
        });

    });
</script>




@endpush