@extends('layouts.main')


@section('container')


<main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Jadwal Rapat</h2>

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
                <table id="jadwal_rapat" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Judul Rapat</th>
                            <th style="text-align: center;" >Nama OPD</th>
                            <th style="text-align: center;">Lokasi</th>
                            <th style="text-align: center;">Waktu</th>
                            <th style="text-align: center;">Jumlah Peserta</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $no=1; ?>
                        @for ($i = 0; $i < $jumlah; $i++)

                        <tr>
                            <td>{{ $no; }}</td>
                            <td  >{{ $data_rapat["data"]["$i"]["judul_rapat"] }}</td>
                            <td >{{ $data_rapat["data"]["$i"]["nama_opd"] }}</td>
                            <td style="width:10%; text-align: center;">{{ $data_rapat["data"]["$i"]["lokasi_rapat"] }}</td>
                            <td style="white-space: nowrap; width:20%; text-align: center;"><p >{{  date('d/m/Y H:i', strtotime($data_rapat["data"]["$i"]["mulai"] )) }} </p><p > {{  date('d/m/Y H:i', strtotime($data_rapat["data"]["$i"]["selesai"] )) }}</p> </td>
                            <td style="width:8%; text-align: center;">{{ $data_rapat["data"]["$i"]["jumlah_peserta"] }}</td>
                            <td style="width:8%; text-align: center;">

                                {{-- kurang api get by ID --}}
                                {{-- <button type="button" class="btn btn-xs btn-warning" data-entry="{{ $data_rapat["data"]["$i"]["id"] }}" data-toggle="modal" data-target="#modal_edit_user" >
                                    <i class="bx bx-show"></i>
                                </button> --}}

                            
                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endfor
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
        $('#jadwal_rapat').DataTable( {
            scrollY:        '50vh',
            scrollCollapse: true,
            paging:         true
        } );

    } );
          
        
        </script>
        


    
@endpush