@extends('layouts.main')
<!-- ======= Hero Section ======= -->
@section('container')
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
        <img src="assets/img/THMNAIL.png"></img>
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


                <a href="https://ppid.madiunkota.go.id/"
                    class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/ppid.jpg" class="card-img" alt="PPID">
                    </div>
                </a>


                <a href="https://docs.google.com/forms/d/e/1FAIpQLSccoegaoe1Ft8U41d2OkyCu6Y7YhBm68m0vZjfg4Ls51aUxpw/viewform"
                    class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/layanan.jpg" class="card-img" alt="...">
                    </div>
                </a>

                <a href="https://kotamadiun.lapor.go.id/"
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


                <a href="http://lpse.madiunkota.go.id/"
                    class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/lpseslmtf-1.jpg" class="card-img" alt="...">
                    </div>
                </a>

                <a href="https://elhkpn.kpk.go.id/portal/user/pengumuman_lhkpn/YTNkaEt6UjBjMGxJT0RGR1JuVjVVWEJ5YTBGUE0wdFNlakEwU0ZoMVZYRkZaVWRaUlcxbVpWUkVSRUZTTUVKRk1tZHdNVkpJWjFOb1drVm1OV2N3VXc9PQ=="
                    class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/elhkpn.png" class="card-img" alt="...">
                    </div>
                </a>

                <a href="https://sirup.lkpp.go.id/sirup/home/rekapKldi?idKldi=D179"
                    class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/sirup.jpg" class="card-img" alt="...">
                    </div>
                </a>

                <a href="https://ula.kemendagri.go.id/"
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

                    @foreach ($berita as $berita)
                    
                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-3 mb-lg-0" style="padding-bottom:30px; padding-left:30px;">
        
                        <div class="card" style="width: 30rem;" data-aos="fade-in" data-aos-delay="100">
                            <a href="/informasi/{{ $berita["id"] }}">
                            <img class="card-img-top" src="assets/img/PECELAND-LOGO-VECTOR-980x693.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <hr>
                                <h6 class="card-text">{{  $berita["judul"] }}</h6>
                                <p  style="color:black;"> <small>by {{ $berita["name"] }} | {{ $berita->created_at->format('d, M Y') }} | jenis kategori</small> </p>
                            </div>
                        </a>
                        </div>
                    </div>
       
                       
                        
                    @endforeach
                    




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
                    <div class="accordion-body">Placeholder content</div>
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
                        <div class="accordion-body">Placeholder content</div>
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
                    <div class="accordion-body">Placeholder content </div>
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
                <div class="accordion-body">Placeholder content</div>
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
                    <div class="accordion-body">Placeholder content </div>
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
                    <div class="accordion-body">Placeholder content </div>
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
                    <div class="accordion-body">Placeholder content f</div>
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

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="card" style="width: 24rem;" data-aos="fade-in" data-aos-delay="100">
                                <img class="card-img-top" src="assets/img/PECELAND-LOGO-VECTOR-980x693.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <hr>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="card" style="width: 24rem;" data-aos="fade-in" data-aos-delay="100">
                                <img class="card-img-top" src="assets/img/PECELAND-LOGO-VECTOR-980x693.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <hr>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="card" style="width: 24rem;" data-aos="fade-in" data-aos-delay="100">
                                <img class="card-img-top" src="assets/img/PECELAND-LOGO-VECTOR-980x693.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <hr>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                dolore labore illum veniam.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                culpa fore nisi cillum quid.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
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
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection