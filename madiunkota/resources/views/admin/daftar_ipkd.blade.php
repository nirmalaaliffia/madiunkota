@extends('layouts.admin')
<!-- ======= Hero Section ======= -->
@section('container_admin')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Default box -->
        <div class="card">

            <div class="card-body">


                <div class="row">

                    @if(session()->has('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif


                    <div class="col-md-8">
                        <div class="row">
                            <button type="button" class="btn right-block btn-primary  " id="btn_tambah_opd"
                                style="padding: 8px 30px;"><i class="fa fa-plus"></i>&ensp; Tambah IPKD
                            </button>

                        </div>
                    </div>


                </div>

                <br>
                {{-- ISI DAFTAR TABEL --}}


                <table id="daftar_ipkd" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:6%;">No</th>
                            <th>Nama Dokumen</th>
                            <th style="text-align: center;width:16%;" >Download</th>
             
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $no=1; ?>
                        @foreach ($ipkd as $ipkd)
                        
                      
                        <tr>
                            <td style="width:7%;text-align:center;">{{ $no; }}</td>
                            <td>{{ $ipkd->nama_file }}</td>
                            <td style="width:12%;text-align:center;">   
                                <a href="/admin/download_ipkd/{{ $ipkd->id_ipkd }}" style="color:white"> <button type="button" class="btn btn-sm btn-success" data-entry="" >
                                <i class="fas fa-download"></i></button></a>
                            
                            <form method="POST" class="form-horizontal d-inline" action="{{ route('ipkd.destroy', $ipkd->id_ipkd) }}" enctype="multipart/form-data">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Apakah anda yakin ingin menghapus IPKD ini?')" class="btn btn-xs btn-danger">
                                    <i class="fas fa-trash"></i>
                                  </button>
                                 
                              </form>
                            </td>
                            
                        </tr>
                        <?php $no++; ?>
                   
                        @endforeach
                    </tfoot>
                </table> <br>




            </div>

        </div>


    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<!-- Modal -->




<!-- Modal  TAMBAH BERITA-->
<div class="modal fade" id="modal_tambah_opd" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah IPKD Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" class="form-horizontal" action="/admin/ipkd" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama IPKD </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama_ipkd') is-invalid @enderror" id="nama_ipkd" name="nama_ipkd" required placeholder="Nama IPKD ">
                                @error('nama_ipkd')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Upload IPKD</label>
                            <div class="col-sm-9">
                                
                                <input type="file" id="file_ipkd[]" name="file_ipkd[]" accept="application/pdf" required multiple class="form-control @error('file_ipkd') is-invalid @enderror" >
                                <div id="list_file"> </div>
                                @error('file_ipkd')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
 
                                @enderror

                                
                                   

                              </div>

                        </div>
                    
                    
                    </div>
                    <!-- /.card-body -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id='create_opd' class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>


    </div>
</div>



<!-- END MODAL TAMBAH  BERITA -->
@endsection




@push('scripts')
@if (count($errors) > 0)
<script type="text/javascript">
    $(document).ready(function () {


        $('#modal_tambah_opd').modal('show');


    });

</script>
@endif
<script type="text/javascript">

$(document).ready(function() {
   $('#daftar_ipkd').DataTable({
    scrollY:        '50vh',
    scrollCollapse: true,
    paging:         true
});
   $('#daftar_ipkd tbody').on('click', '.btn-edit-opd', function () {
    var $id = this.getAttribute('data-entry');
                
                         $.ajax({
                        data: $id,
                        url: "/admin/opd/" + $id + "/edit",
                        type: 'get',
                        dataType: 'json',
                        success: function (response) {
                         // var bidang = JSON.parse(response.list_bidang);
                         $('#modal_edit_opd').modal('show');
                        
                         $('#edit_nama_opd').val(response.opd_selected[0]['nama_opd']);
                        //  $('#edit_bidang_opd').val(response.opd_selected[0]['id_bidang']);
                         $('#edit_alamat_opd').val(response.opd_selected[0]['alamat_opd']);
                         $('#edit_telp_opd').val(response.opd_selected[0]['no_telp']);
                         $('#edit_fax_opd').val(response.opd_selected[0]['no_fax']);
                         
                         $("#edit_bidang_opd").val(response.opd_selected[0]['id_bidang']).trigger('change');
                         var form = document.getElementById("edit_form_opd");
                          form.action = "/admin/opd/" + response.opd_selected[0]['id_opd'] ;
                        }
        
                    });

} );
   
   
} );


    $(document).ready(function () {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#btn_tambah_opd').click(function (e) {

            $('#modal_tambah_opd').modal('show');

        });


        $('#btn_delete_opd').click(function (e) {

          var $id = this.getAttribute('data-entry');

          $.ajax({
            data: $id,
            url: "/admin/opd/" + $id ,
            type: 'delete',
            dataType: 'json',
            success: function (response) {
     // var bidang = JSON.parse(response.list_bidang);
    
                  console.log(response)

              }

             });

        });




    });

</script>

@endpush
