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
                                style="padding: 8px 30px;"><i class="fa fa-plus"></i>&ensp; Tambah OPD Baru
                            </button>

                        </div>
                    </div>


                </div>

                <br>
                {{-- ISI DAFTAR TABEL --}}


                <table id="daftar_opd" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama OPD</th>
                            <th>Jenis OPD</th>
                            <th>Alamat</th>
                            <th>No Fax</th>
                            <th>No Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $no=1; ?>
                        @foreach ($opd as $opd)
                        <tr>
                            <td>{{  $no; }}</td>
                            <td>{{ $opd->nama_opd }}</td>
                            <td>{{ $opd->nama_bidang }}</td>
                            <td style="word-break: break-all">{{ $opd->alamat_opd }}</td>
                            <td>{{  $opd->no_fax }}</td>
                            <td>{{  $opd->no_telp }}</td>
                            <td>

                                <button type="button" class="btn btn-xs btn-warning btn-edit-opd" data-entry="{{ $opd->id_opd }}" data-toggle="modal" >
                                    <i class="fas fa-edit"></i>
                                </button>


     
                                <form method="POST" class="form-horizontal d-inline" action="{{ route('opd.destroy', $opd->id_opd) }}" enctype="multipart/form-data">
                                  @method('delete')
                                  @csrf
                                  
                                  <input type="hidden" class="form-control" id="id_opd" name="id_opd" value="{{ $opd->id_opd }}" >

                                  <button  data-entry="{{ $opd->id_opd }}" onclick="return confirm('Apakah anda yakin ingin menghapus berita ini?')" class="btn btn-xs btn-danger">
                                    <i class="fas fa-trash"></i>
                                  </button>

                                  {{-- <button type="button"  class="btn btn-xs btn-warning" data-toggle="modal"
                                    data-target="#modal_view_berita">
                                    <i class="fas fa-edit"></i>
                                </button> --}}
                                </form>



                            </td>
                        </tr>
                        <?php $no++; $id_opd= $opd->id_opd; ?>
                        @endforeach


                    </tbody>

                    </tfoot>
                </table>




            </div>

        </div>


    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<!-- Modal -->




<!-- Modal  TAMBAH OPD-->
<div class="modal fade" id="modal_tambah_opd" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Berita Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" class="form-horizontal" action="/admin/opd" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama OPD </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama_opd') is-invalid @enderror"
                                    id="nama_opd" name="nama_opd" required placeholder="Masukkan OPD Baru">
                                @error('nama_opd')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis OPD</label>
                            <div class="col-sm-9">

                                <select class="form-control select-bidang @error('bidang_opd') is-invalid @enderror"
                                    style="width: 100%;" id="bidang_opd" required name="bidang_opd">
                                    <option></option>
                                    @foreach ($list_bidang as $list)
                                    <option value="{{ $list->id }}"> {{ $list->nama_bidang }}</option>
                                    @endforeach


                                </select>

                                @error('bidang_opd')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat OPD</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('alamat_opd') is-invalid @enderror"
                                    id="alamat_opd" name="alamat_opd" required placeholder="Masukkan Alamat OPD">
                                @error('alamat_opd')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">No Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror"
                                    id="no_telp" name="no_telp" required placeholder="Masukkan No Telepon">
                                @error('no_telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">No Fax</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_fax') is-invalid @enderror"
                                    id="no_fax" name="no_fax" required placeholder="Masukkan No Fax">

                                @error('no_fax')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                                @enderror </div>

                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Link Google Map</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('lokasi_gps') is-invalid @enderror"
                                    id="lokasi_gps" name="lokasi_gps" required placeholder="Masukkan Link Google Map">

                                @error('lokasi_gps')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                                @enderror </div>

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


<!-- END MODAL TAMBAH  OPD -->

<!-- Modal  EDIT OPD-->
<div class="modal fade" id="modal_edit_opd" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit OPD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method="POST" id="edit_form_opd" class="form-horizontal" action="" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Nama OPD </label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control @error('edit_nama_opd') is-invalid @enderror"
                          id="edit_nama_opd" value="{{ old('edit_nama_opd') }}" name="edit_nama_opd" required placeholder="Masukkan OPD Baru">
                      @error('edit_nama_opd')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>

                      @enderror
                  </div>
              </div>

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis OPD</label>
                  <div class="col-sm-9">

                      <select class="form-control select-bidang @error('edit_bidang_opd') is-invalid @enderror"
                          style="width: 100%;" id="edit_bidang_opd" required name="edit_bidang_opd">
                           <option value="{{ old('edit_bidang_opd') }}"></option>
                          @foreach ($list_bidang as $list)
                                    <option value="{{ $list->id }}"> {{ $list->nama_bidang }}</option>
                            @endforeach


                      </select>

                      @error('edit_bidang_opd')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>

                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat OPD</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control @error('edit_alamat_opd') is-invalid @enderror"
                        id="edit_alamat_opd" value="{{ old('edit_alamat_opd') }}" name="edit_alamat_opd"  required placeholder="Masukkan Alamat OPD">
                    @error('edit_alamat_opd')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">No Telepon</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control @error('edit_telp_opd') is-invalid @enderror"
                        id="edit_telp_opd" name="edit_telp_opd" value="{{ old('edit_telp_opd') }}" required placeholder="Masukkan No Telepon">
                    @error('edit_telp_opd')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                </div>

            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">No Fax</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control @error('edit_fax_opd') is-invalid @enderror"
                        id="edit_fax_opd" name="edit_fax_opd" value="{{ old('edit_fax_opd') }}" required placeholder="Masukkan No Fax">

                    @error('edit_fax_opd')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror </div>

            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Link Google Map</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control @error('edit_lokasi_gps') is-invalid @enderror"
                        id="edit_lokasi_gps" name="edit_lokasi_gps" value="{{ old('edit_lokasi_gps') }}" required placeholder="Masukkan Link Google Map">

                    @error('edit_lokasi_gps')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror </div>

            </div>

      


            </div>
            <!-- /.card-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
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
   $('#daftar_opd').DataTable();
   $('#daftar_opd tbody').on('click', '.btn-edit-opd', function () {
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
                         $('#edit_lokasi_gps').val(response.opd_selected[0]['lokasi_gps']);
                         
                         $("#edit_bidang_opd").val(response.opd_selected[0]['id_bidang']).trigger('change');
                         var form = document.getElementById("edit_form_opd");
                          form.action = "/admin/opd/" + response.opd_selected[0]['id_opd'] ;
                        }
        
                    });

} );
   
   
} );
    // $(function(){
    //   $('#modal_view_berita').modal('show');
    // });

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


        // function edit_user(id){
        //     $.ajax({
        //         data: id,
        //         url: "/admin/user/" + id + "/edit",
        //         type: 'get',
        //         dataType: 'json',
        //         success: function (response) {
        //             // var bidang = JSON.parse(response.list_bidang);
        //             $('#modal_edit_user').modal('show');
        //             $('#edit_nama').val(response.user_selected[0]['name']);
        //             $('#edit_email').val(response.user_selected[0]['email']);
        //              $('#edit_id').val(response.user_selected[0]['id']);
        //              var form = document.getElementById("edit_form_user");
        //              form.action = "/admin/user/" + response.user_selected[0]['id'] ;
        //               }
        //     });
        // }

        // $('.btn-edit-opd').click(function (e) {
                 
        //          var $id = this.getAttribute('data-entry');
                
        //          $.ajax({
        //         data: $id,
        //         url: "/admin/opd/" + $id + "/edit",
        //         type: 'get',
        //         dataType: 'json',
        //         success: function (response) {
        //          // var bidang = JSON.parse(response.list_bidang);
        //          $('#modal_edit_opd').modal('show');
                
        //          $('#edit_nama_opd').val(response.opd_selected[0]['nama_opd']);
        //         //  $('#edit_bidang_opd').val(response.opd_selected[0]['id_bidang']);
        //          $('#edit_alamat_opd').val(response.opd_selected[0]['alamat_opd']);
        //          $('#edit_telp_opd').val(response.opd_selected[0]['no_telp']);
        //          $('#edit_fax_opd').val(response.opd_selected[0]['no_fax']);
                 
        //          $("#edit_bidang_opd").val(response.opd_selected[0]['id_bidang']).trigger('change');
        //          var form = document.getElementById("edit_form_opd");
        //           form.action = "/admin/opd/" + response.opd_selected[0]['id_opd'] ;
        //         }

        //     });

        //      });













    });

</script>

@endpush
