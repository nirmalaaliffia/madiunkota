@extends('layouts.main')


@section('container')


<main id="main">

   <!-- ======= BERITA TERKINI Section ======= -->
   <section id="berita_terkini"  >
    <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Daftar Alamat OPD Kota Madiun</h2>

        </div>
  <!-- Default box -->
  <div class="card">

    <div class="card-body">


        <div class="row">


        </div>

        <br>
        {{-- ISI DAFTAR TABEL --}}
        <table id="ipkd" class="display" style="width:100%">
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Nama OPD</th>
                    <th style="text-align: center;" >Alamat</th>
                    <th style="text-align: center;" >No Telepon</th>
     
                </tr>
            </thead>
            <tbody>
                <?php  $no=1; ?>
                @foreach ($profil as $profil)
           
                <tr>
                    <td style="width:7%;text-align:center;">{{ $no; }}</td>
                    <td>{{ $profil->nama_opd }}</td>
                    <td><a href="{{ $profil->lokasi_gps }}" target="_blank">{{ $profil->alamat_opd }} </a></td>
                    <td>{{ $profil->no_telp }} <br>Fax. {{ $profil->no_fax }}</td>
                    
                </tr>
                <?php $no++; ?>
       
                @endforeach
            </tfoot>
        </table> <br>




    </div>

</div>


</div>
</section><!-- End Services Section -->


</main><!-- End #main -->

@endsection


@push('script')


<script ttype="text/javascript">

$(document).ready(function() {
$('#ipkd').DataTable( {
    scrollY:        '50vh',
    scrollCollapse: true,
    paging:         true
} );

} );
  

</script>




@endpush