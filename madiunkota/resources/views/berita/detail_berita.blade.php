@extends('layouts.main')


@section('container')


<main id="main">


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-lg-9">
                    {{-- foreach berita --}}
                    @foreach ($berita as $berita)
                    <h3> {{  $berita->judul }} </h3>
                    <p><small> By {{ $berita->name }} | {{ date('d M Y', strtotime($berita->created_at)) }} |
                            {{ $berita->array_kategori }}</small> </p>
                    <br>

                    @if((count($data_foto)) != 0)
                    <div id="carouselExampleIndicators"
                        style="display: block; margin-left: auto; margin-right: auto; width: 100%;"
                        class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators" style="max-height: 500px">
                            <?php
                        for ($i = 0; $i < count($data_foto); $i++) { ?>

                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"
                                aria-label="Slide 2"></button>

                            <?php   } ?>

                        </div>
                        <div class="carousel-inner" style="max-height: 500px;">



                            @foreach($data_foto as $key => $slider)
                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                <img src="{{asset("$slider->path_foto")}}" class="d-block w-100" alt="...">
                            </div>
                            @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <br>

                    @endif

                    {{-- foreach data_file --}}
                    @if((count($data_file)) != 0)
                    @foreach ($data_file as $df)

                    <div class="col">
                        <div class="card border-0" style="display:auto; text-align:center; align:center;">
                            <iframe src="{{asset("$df->path_foto")}}"
                                style="width:80%;height:600px;margin: 0 auto;"></iframe>
                            <div class="card-body">
                                <a href="/file-download/{{ $df->id }}"><button type="button"
                                        class="btn btn-xs btn-success">
                                        <i class="bx bx-download"></i> Unduh File
                                    </button></a> <br>

                            </div>

                        </div>
                    </div>
                    @endforeach
                    @endif



                    <br>
                    <?php echo(stripslashes($berita->deskripsi));   ?> <br>

                    {{-- foreach berita --}}
                    @endforeach
                </div>
                <div class="col-5 col-lg-3" style="display: flex;">
                    <div style="width: 0px; height: 100%; border: 0.5px #000 solid;"> </div>&emsp;

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
                            <li class="list-group-item border-0"><a
                                    href="https://sirup.lkpp.go.id/sirup/home/rekapKldi?idKldi=D179" target="_blank">
                                    <img src="{{ asset('assets/img/sirup.png') }}" class="card-img" alt="...">
                                </a></li>
                            <li class="list-group-item border-0"><a href="http://lpse.madiunkota.go.id/"
                                    target="_blank">
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
        </div>
    </section><!-- End Services Section -->


</main><!-- End #main -->

@endsection
