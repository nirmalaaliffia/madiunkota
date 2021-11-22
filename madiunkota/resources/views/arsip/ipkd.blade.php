@extends('layouts.main')


@section('container')


<main id="main">

   <!-- ======= BERITA TERKINI Section ======= -->
   <section id="berita_terkini"  >
    <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>IPKD</h2>

        </div>
  <!-- Default box -->
  <div class="card">

    <div class="card-body">


        <div class="row">

            {{-- @if(session()->has('success'))
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif --}}


        


        </div>

        <br>
        {{-- ISI DAFTAR TABEL --}}
        <table id="ipkd" class="display table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Nama Dokumen</th>
                    <th style="text-align: center;" >Download</th>
     
                </tr>
            </thead>
            <tbody>
                <?php  $no=1; ?>
                @foreach ($berita as $berita)
           
                <tr>
                    <td style="width:7%;text-align:center;">{{ $no; }}</td>
                    <td>{{ $berita->nama_file }}</td>
                    <td style="width:12%;text-align:center;">    
                        <a href="/arsip/download_ipkd/{{ $berita->id }}" style="color:white"> <button type="button" class="btn btn-xs btn-success" data-entry="" >
                            <i class="bx bx-download"></i></button></a>
                    </td>
                    
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