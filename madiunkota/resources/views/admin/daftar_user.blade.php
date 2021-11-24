@extends('layouts.admin')
<!-- ======= Hero Section ======= -->
@section('container_admin')

    <!-- Main content -->
    <section class="content">

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
                          <button type="button" class="btn right-block btn-primary  " id="btn_tmbh_user"
                              style="padding: 8px 30px;"><i class="fa fa-plus"></i>&ensp; TAMBAH USER BARU
                          </button>

                      </div>
                  </div>


              </div>

              <br>
              {{-- ISI DAFTAR TABEL --}}


              <table id="daftar_user" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama User</th>
                          <th>Email</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php  $no=1; ?>
                      @foreach ($user as $user)
                      <?php
                      // if( $errors->has('edit_nama') OR  $errors->has('edit_email') OR $errors->has('password_baru')  OR  $errors->has('konfirmasi_password_baru') ){
                      //   echo '<script> console.log("dsd"); </script>';
                      // }
                  
                      ?>
  
                      <tr>
                          <td>{{  $no; }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td><button type="button" class="btn btn-xs btn-warning btn-edit-user" data-entry="{{ $user->id }}"
                                  data-entry="{{ $user->id }}"  data-toggle="modal" data-target="#modal_edit_user" >
                                  <i class="fas fa-edit"></i>
                              </button>


   
                              <form method="POST" class="form-horizontal d-inline" action="{{ route('user.destroy', $user->id) }}" enctype="multipart/form-data">
                                @method('delete')
                                @csrf
                                
                                <input type="hidden" class="form-control" id="id_berita" name="id_berita" value="{{ $user->id }}" >

                                <button  data-entry="{{ $user->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus berita ini?')" class="btn btn-xs btn-danger">
                                  <i class="fas fa-trash"></i>
                                </button>

                                {{-- <button type="button"  class="btn btn-xs btn-warning" data-toggle="modal"
                                  data-target="#modal_view_berita">
                                  <i class="fas fa-edit"></i>
                              </button> --}}
                              </form>



                          </td>
                      </tr>
                      <?php $no++; ?>
                      @endforeach


                  </tbody>

                  </tfoot>
              </table>




          </div>

      </div>

  
      </section>
      <!-- /.content -->



<!-- Modal  TAMBAH BERITA-->
<div class="modal fade" id="modal_tambah_user" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Tambah User Baru</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="POST" id="form_create_user" class="form-horizontal" action="/admin/user" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                      <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Lengkap </label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                  id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
                              @error('nama_lengkap')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>

                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">

                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                  id="email" name="email" placeholder="Masukkan email " required>

                              @error('email')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>

                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                              <input type="password" class="form-control @error('password') is-invalid @enderror"
                                  id="password" name="password" placeholder="Masukkan password" required>
                              @error('password')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>

                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                          <div class="col-sm-9">
                              <input type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror"
                                  id="konfirmasi_password" name="konfirmasi_password" placeholder="Masukkan No Telepon" required>
                              @error('konfirmasi_password')
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
              <button type="submit" id='create_opd' class="btn btn-primary">Tambah</button>
          </div>
      </div>
      </form>


  </div>
</div>


<!-- END MODAL TAMBAH  OPD -->

<!-- Modal  EDIT USER-->
<div class="modal fade" id="modal_edit_user" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
           
            <form method="POST" id="edit_form_user" class="form-horizontal" action="" enctype="multipart/form-data">
              @method('put')
              @csrf
              <input type="hidden" class="form-control @error('edit_id') is-invalid @enderror" id="edit_id" name="edit_id" required >
              <div class="card-body">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Lengkap </label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control @error('edit_nama') is-invalid @enderror"
                              id="edit_nama" name="edit_nama"  value="{{ old('edit_nama') }}" placeholder="Masukkan nama lengkap" required>
                          @error('edit_nama')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>

                          @enderror
                      </div>
                  </div>
                  <div class="form-group row" >
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">

                        <input type="email" class="form-control @error('edit_email') is-invalid @enderror"
                              id="edit_email" name="edit_email" value="{{ old('edit_email') }}"  placeholder="Masukkan email " required>

                          @error('edit_email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>

                          @enderror
                      </div>
                  </div>


                  <div class="form-group row" id="show_password" onclick = "displayPassword()">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <button type="button" class="btn btn-block btn-primary"  > Reset Password &ensp;
                          <i class="fas fa-key"></i>
                      </button>
                      </div>
                  </div>

                  <div class="form-group row" id="toggle_div_password" style="display:none">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                          <input type="password" class="form-control @error('password_baru') is-invalid @enderror"
                              id="password_baru" value="{{ old('password_baru') }}" name="password_baru" placeholder="Masukkan password baru">
                          @error('password_baru')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>

                          @enderror
                      </div>
                  </div>
                  <div class="form-group row" id="toggle_div_konfirm" style="display:none">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                      <div class="col-sm-9">
                          <input type="password" class="form-control @error('konfirmasi_password_baru') is-invalid @enderror"
                              id="konfirmasi_password_baru" value="{{ old('konfirmasi_password_baru') }}" name="konfirmasi_password_baru" placeholder="Masukkan Konfirmasi password">
                          @error('konfirmasi_password_baru')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>

                          @enderror
                      </div>

                  </div>
                  <div class="form-group row" id="hide_password" onclick = "hidePassword()" style="display:none">
                    <label for="inputPassword3" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                      <button type="button" class="btn btn-block btn-danger"  >Urungkan Password &ensp;
                        <i class="fas fa-key"></i>
                    </button>
                    </div>
                </div>

              


          </div>
          <!-- /.card-body -->
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" value="submit_edit_user" id='submit_edit_user' class="btn btn-primary">Ubah</button>
          </div>
      </div>
      </form>


  </div>
</div>


<!-- END MODAL EDIT  USER -->

    @endsection



@push('scripts')
@if ( $errors->has('email') OR  $errors->has('nama_lengkap')  OR  $errors->has('password')  OR  $errors->has('konfirmasi_password') )
<script type="text/javascript">
    $(document).ready(function () {


        $('#modal_tambah_user').modal('show');


    });

</script>
@endif

@if ( $errors->has('edit_nama') OR  $errors->has('edit_email') OR $errors->has('password_baru')  OR  $errors->has('konfirmasi_password_baru') )
<script type="text/javascript">
    $(document).ready(function () {


          $('#modal_edit_user').modal('show');




    });

</script>
@endif

@if (  $errors->has('password_baru')  OR  $errors->has('konfirmasi_password_baru') )
<script type="text/javascript">
    $(document).ready(function () {

      $("#toggle_div_password").toggle();
        $("#toggle_div_konfirm").toggle();
        $("#hide_password").toggle();
        $("#show_password").toggle();
        $("#password_baru").prop('required',true);
        $("#konfirmasi_password_baru").prop('required',true);

    });

</script>
@endif



<script type="text/javascript">

$(document).ready(function() {
   $('#daftar_user').DataTable();
    $('#daftar_user tbody').on('click', '.btn-edit-user', function () {

        var $id = this.getAttribute('data-entry');

            $.ajax({
                data: $id,
                url: "/admin/user/" + $id + "/edit",
                type: 'get',
                dataType: 'json',
                success: function (response) {
                 // var bidang = JSON.parse(response.list_bidang);
                 $('#modal_edit_user').modal('show');
                 $('#edit_nama').val(response.user_selected[0]['name']);
                 $('#edit_email').val(response.user_selected[0]['email']);
                 $('#edit_id').val(response.user_selected[0]['id']);
                 var form = document.getElementById("edit_form_user");
                 form.action = "/admin/user/" + response.user_selected[0]['id'] ;
                }

            });
    } );
} );
    // $(function(){
    //   $('#modal_view_berita').modal('show');
    // });

    $(document).ready(function () {



      $('#show_password').on('click', function(e){
        $("#toggle_div_password").toggle();
        $("#toggle_div_konfirm").toggle();
        $("#hide_password").toggle();
        $("#show_password").toggle();
        $("#password_baru").prop('required',true);
        $("#konfirmasi_password_baru").prop('required',true);

      });

      $('#hide_password').on('click', function(e){
        $("#toggle_div_password").toggle();
        $("#toggle_div_konfirm").toggle();
        $("#hide_password").toggle();
        $("#show_password").toggle();
        $("#password_baru").prop('required',false);
        $("#konfirmasi_password_baru").prop('required',false);

      });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#btn_tmbh_user').click(function (e) {

            $('#modal_tambah_user').modal('show');

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



        // $('.btn-edit-user').click(function (e) {
                 
        //     var $id = this.getAttribute('data-entry');

        //     $.ajax({
        //         data: $id,
        //         url: "/admin/user/" + $id + "/edit",
        //         type: 'get',
        //         dataType: 'json',
        //         success: function (response) {
        //          // var bidang = JSON.parse(response.list_bidang);
        //          $('#modal_edit_user').modal('show');
        //          $('#edit_nama').val(response.user_selected[0]['name']);
        //          $('#edit_email').val(response.user_selected[0]['email']);
        //          $('#edit_id').val(response.user_selected[0]['id']);
        //          var form = document.getElementById("edit_form_user");
        //          form.action = "/admin/user/" + response.user_selected[0]['id'] ;
        //         }

        //     });
        // });


      


        // function get_action(form){
        //   var form = document.getElementById("form4");
        //   form.action = "/admin/user/$id";
        //   form.submit();
        // }

       


        // $('.submit_edit_user').on('submit', function(e) {
        //          e.preventDefault();

                 

        //         let edit_nama = $('#edit_nama').val();
        //         let edit_email = $('#edit_email').val();
        //         let password_baru = $('#password_baru').val();
        //         let konfirmasi_password_baru = $('#konfirmasi_password_baru').val();
        //         var user = $('#edit_id').val();

        //         $.ajax({ 
        //           url: "/admin/user/" + $user,
        //           type: "PATCH",
        //           cache: false,
        //           data:{
        //             _token:'{{ csrf_token() }}',
        //             name: edit_nama
        //             },
        //             success: function(response){
        //               // dataResult = JSON.parse(dataResult);
        //               console.log(response)
        //               }
        //         });


        //         //  $.ajax({
        //         //      dataType: $('#edit_form_user').serialize(),
        //         //      url: "/admin/user/" + $user ,
        //         //      type: 'put',
        //         //      success: function (response) {
        //         //       // var bidang = JSON.parse(response.list_bidang);
        //         //       // $('#modal_edit_user').modal('show');
        //         //       // $('#edit_nama').val(response.user_selected[0]['name']);
        //         //       // $('#edit_email').val(response.user_selected[0]['email']);
        //         //       console.log(response)
        //         //      },
        //         //      error:function(error){
        //         //        console.log(error);
        //         //      }
     
        //         //  });
        //      });





    });

</script>

@endpush