@extends('layouts.main')


@section('container')


<main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>{{ $title }}</h2>

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
                            <th style="text-align: center;width:5%; ">No</th>
                            <th style="text-align: center;">Nama Agenda</th>
                            <th style="text-align: center;" >Lokasi</th>
                            <th style="text-align: center;">Waktu</th>
                            <th style="text-align: center;">Leading Sektor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $no=1; ?>
                        @for ($i = 0; $i < $jumlah; $i++)

                        <tr>
                            <td style="text-align: center;width:5%; ">{{ $no; }}</td>
                            <td  style="white-space: nowrap;width:20%; ">
                               <p> <strong style="color:rgb(204, 95, 76)">{{ $data_agenda["data"]["$i"]["nama_agenda"] }} </strong></p>
                              

                                @if ($data_agenda["data"]["$i"]["status_agenda"] == "Sedang Berlangsung")
                                <p >  <span style="color:red;"> Status : {{ $data_agenda["data"]["$i"]["status_agenda"]  }} </span></p>
                                @endif
                                   @if($data_agenda["data"]["$i"]["status_agenda"]  == "Belum Berlangsung")
                                   <p>  Status : <span style="color:blue;"> {{ $data_agenda["data"]["$i"]["status_agenda"]  }} </span></p>
                                   @endif
                                   @if($data_agenda["data"]["$i"]["status_agenda"]  == "Selesai")
                                   <p >  Status :   <span style="color:green;"> {{ $data_agenda["data"]["$i"]["status_agenda"] }} </span></p>
                                   @endif
                            </td>
                            <td style="text-align: center;">{{ $data_agenda["data"]["$i"]["lokasi"] }}</td>
                            <td style="width:20%; text-align: center;">
                                <p> <strong style="color:rgb(204, 95, 76)">{{ date('d M Y', strtotime( $data_agenda["data"]["$i"]["tanggal"])) }} </strong></p>
                                <p>{{ date('H:i', strtotime( $data_agenda["data"]["$i"]["jam_mulai"] )) }} - {{ date('H:i', strtotime($data_agenda["data"]["$i"]["jam_selesai"] ))}}</p> 
                            </td>

                            <td style="width:25%; text-align: center;">{{ $data_agenda["data"]["$i"]["nama_skpd"] }}</td>
                          
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
            scrollCollapse: true,
            paging:         true
        } );

    } );
          
        
        </script>
        


    
@endpush