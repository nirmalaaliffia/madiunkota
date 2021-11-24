<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pemerintah Kota Madiun | {{ $title }} </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- =======================================================
  * Template Name: Squadfree - v4.6.0
  * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('layouts.partials.navbar')


    <!-- ===============ISI CONTAINER================== -->

    @yield('container')

    <script src="{{ asset('template_login/platform.js') }}" defer></script>
    <div class="elfsight-app-cf308ac4-77d9-4013-b9ab-c96a18ce6e53"></div>
    <!-- End #container -->


    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>Kontak Kami</h3>
                            <p class="pb-3"><em>Dinas Komunikasi dan Informatika</em></p>
                            <p>
                                JL. Perintis Kemerdekaan <br>
                                No. 32 Kota Madiun<br><br>
                                <strong>Telepon:</strong> (0351) 467327<br>
                                <strong>Email:</strong> kominfo.madiunkota@gmail.com <br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="https://twitter.com/pemkotmadiun_/" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="https://id-id.facebook.com/pemkotmadiun/" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/pemkotmadiun_/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                                {{-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Kategori</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Berita</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div> --}}

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Link Terkait</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="madiunkota.bps.go.id" target="_blank">BPS Kota Madiun</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="kotamadiun.jdih.jatimprov.go.id" target="_blank">JDIH Kota Madiun</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="mail.madiunkota.go.id" target="_blank">Login Email</a></li>
                        </ul>
                    </div>

                    {{-- <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Cari</h4>
                        
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Cari">
                        </form>

                    </div> --}}

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>2021</span></strong>. Pemerintah Kota Madiun
            </div>          
        </div>
    </footer><!-- End Footer -->

    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}


    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
   
     
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template_login/jquery.dataTables.min.js') }}"></script>
    

    @stack('script')

</body>

</html>