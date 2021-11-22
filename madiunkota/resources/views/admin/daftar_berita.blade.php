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
                          <a href="/admin/berita/create"><button type="button" class="btn btn-block btn-primary " style="padding: 8px 30px;"><i class="fa fa-plus"></i>&ensp; Tambah Berita Baru
                          </button></a>
                            {{-- @dd($list_kategori) --}}
                            {{-- <label for="inputPassword" class="col-auto col-form-label"> Kategori Berita</label>
                            <div class="col-sm-5">
                                <select class="select2bs4" multiple="multiple" data-placeholder="Filter kategori berdasarkan" 
                                style="width: 100%;" data-live-search="true">
                                @foreach ($list_kategori as $list)
                                <option value="{{ $list->id }}"> {{ $list->jenis_kategori }}</option>
                                @endforeach
                             </select>

                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn right-block btn-primary ">Filter</button>
                            </div> --}}

                        </div>
                    </div>
                    {{-- <div class="col-md-3 offset-md-1">
                        <button type="button" class="btn right-block btn-success " data-toggle="modal"
                            data-target="#modal_tambah_berita"><i class="fa fa-plus"></i>&ensp; Tambah Berita Baru
                        </button>
                    </div> --}}

                     {{-- <div class="col-md-3 offset-md-1">
                        <a href="/admin/berita/create"><button type="button" class="btn right-block btn-primary "><i class="fa fa-plus"></i>&ensp; Tambah Berita Baru
                        </button></a>
                    </div> --}}


                </div>

                <br>
                {{-- ISI DAFTAR TABEL --}}


                <table id="daftar_berita" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Berita</th>
                            <th>Kategori Berita</th>
                            <th>Tanggal Posting</th>
                            <th> Status Pinned</th>
                            <th>Pengirim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $no=1; ?>
                        @foreach ($berita as $berita)
                        <tr>
                            <td>{{  $no; }}</td>
                            <td>{{ $berita->judul }}</td>
                            <td style="word-break: break-all">{{ $berita->array_kategori }}</td>
                            <td>{{ date('d M Y', strtotime($berita->created_at)) }}</td>
                            @if ($berita->status_pinned == 1)
                            <td>  <i class="fas fa-thumbtack " style="color:red"></i> Pinned </td>        
                            @else
                            <td> Unpinned </td>      
                            @endif
                                          
                            <td>{{  $berita->name }}</td>
                            <td><a href="/admin/berita/{{ $berita->id_berita }}/edit"><button type="button"  class="btn btn-xs btn-warning btn-edit-berita" >
                                    <i class="fas fa-edit"></i>
                                </button></a>
                                {{-- data-toggle="modal"
                                data-target="#modal_view_berita"  --}}

                               
                                <button data-entry="{{ $berita->id_berita }}" class="btn btn-xs btn-info btn_view"  data-toggle="modal"  >
                                    <i class="fas fa-eye"></i>
                                </button>
                         

                                <form method="POST" class="form-horizontal d-inline" action="/admin/berita/hapus_berita" enctype="multipart/form-data">
                                  @csrf
                                  
                                  <input type="hidden" class="form-control" id="id_berita" name="id_berita" value="{{ $berita->id_berita }}" >

                                  <button onclick="return confirm('Apakah anda yakin ingin menghapus berita ini?')" class="btn btn-xs btn-danger">
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

  
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->


<!-- Modal -->
{{-- <div class="modal fade" id="modal_edit_berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ubah berita </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ... 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  </section> --}}
  <!-- END MODAL EDIT -->
  
  <!-- Modal  BERITA-->
  <div class="modal fade" id="modal_view_berita" data-backdrop="static"   aria-hidden="true" >
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Lihat Detail Berita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" class="form-horizontal" id="form_view_berita" action="" enctype="multipart/form-data">
            @csrf
            <!-- form start -->

            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Judul Berita</label>
                    <div class="col-sm-9">
                        <input disabled type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                            placeholder="Masukkan Judul Berita" required autofocus value="{{ old('judul') }}" >
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                                
                            @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Kategori Berita</label>
                    <div class="col-sm-9">
                        <select disabled class="select2bs4 form-control @error('kategori_berita_pop') is-invalid @enderror" multiple="multiple"
                            data-placeholder="Filter kategori berdasarkan" style="width: 100%;"
                            data-live-search="true" id="kategori_berita_pop" name="kategori_berita_pop[]" required >
                            @foreach ($list_kategori as $list)

                            <option value="{{ $list->id }}" > {{ $list->jenis_kategori }}</option>
                                
                         
                            @endforeach
                        </select>
                        @error('kategori_berita')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                            
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <textarea disabled type="text" class="summernote form-control"
                            id="deskripsi_view" name="deskripsi_view" placeholder="Silahkan isi berita"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Upload Media</label>
                    <div class="col-sm-9">

                        <input type="file" id="file_berita[]" name="file_berita[]" required multiple class="form-control @error('file_berita') is-invalid @enderror" accept="">
                        @error('file_berita')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                            
                        @enderror
                      </div>

                </div>
                @if ($errors->has('files'))
                @foreach ($errors->get('files') as $error)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $error }}</strong>
                </span>
                @endforeach
                @endif

            </div>
            <!-- /.card-body -->
          </form>

          <table id="view_file_berita" class="table table-striped" style="width:100%">
            <thead>
              
                <tr>  
                    <th>#</th>
                    <th>Nama File</th>
                    <th>Aksi</th>
                  
                </tr>
            </thead>
            <tbody>
              
               
               
            </tbody>
           
        </table>
        </div>
        <div class="modal-footer">
 
          <button type="button" id="tutup_view_berita" class="btn btn-primary">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  </section>
  <!-- END MODAL VIEW BERITA -->
  
  
  <!-- Modal  TAMBAH BERITA-->
  {{-- <div class="modal fade" id="modal_tambah_berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Berita Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action=" /admin/berita/store" enctype="multipart/form-data">
            @csrf
           <!-- form start -->
           <form class="form-horizontal">
            <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Judul Berita</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Masukkan Judul Berita">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Kategori Berita</label>
                <div class="col-sm-9">
                    <select class="select2bs4" multiple="multiple" data-placeholder="Filter kategori berdasarkan" 
                                style="width: 100%;" data-live-search="true">
                                @foreach ($list_kategori as $list)
                                <option value="{{ $list->id }}"> {{ $list->jenis_kategori }}</option>
                                @endforeach
                        </select>
               
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-9">
                    <div class="summernote">summernote 1</div>
                </div>
              </div>         
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Upload Media</label>
                <div class="col-sm-9" >
                 
                  <input type="file" name="file_berita[]" multiple class="form-control" accept="">
                </div>
                
              </div>
              @if ($errors->has('files'))
              @foreach ($errors->get('files') as $error)
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $error }}</strong>
              </span>
              @endforeach
            @endif
          
            </div>
            <!-- /.card-body -->
  
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  </section> --}}
  <!-- END MODAL TAMBAH  BERITA -->

   
@endsection


@push('scripts')
<script ttype="text/javascript">
$(document).ready(function() {
    $('#daftar_berita').DataTable();


} );


// $(function(){
//   $('#modal_view_berita').modal('show');
// });

   $(document).ready(function(){
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.btn_view').click(function (e){
       

      var $id=this.getAttribute('data-entry');

      $.ajax({
        data: $id,
        url: "/admin/berita/" + $id,
        type:'get',
        dataType: 'json',
        success:function(response){
          if(response.length == 0){
            //show alert
          }else{
            var berita = JSON.parse(response.berita);
            var kategori_sel = JSON.parse(response.kategori_select);
           

            var html = '<tr>';
              var no=1;
            for(var x=0; x<response.file_berita.length; x++){
              html += '<td>'+(x+1)+'</td>';
              html += '<td>'+response.file_berita[x]['nama_foto']+'</td>';
              html += '<td>  <a href="'+response.file_berita[x]['path_foto']+'" target="_blank" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-folder-open"></i></a></td></tr>';
 
            }
            $('#view_file_berita').prepend(html);
             $('#modal_view_berita').modal('show');
             $('#judul').val(berita[0]['judul']);

             //var datsa = [{id_kategori:1, text:'ds'}];
          // $('#kategori_berita_pop').select2().val([ kategori_sel[0][id_kategori]]).trigger('change');
            // $('#kategori_berita_pop option[value="'+response.kategori_select+'"]').prop('selected', true);
            var name = "";
            for(var i=0; i<kategori_sel.length; i++){
                if(i+1 == kategori_sel.length){
                  name = name + kategori_sel[i]['id_kategori'] ;
                }else{
                  name = name + kategori_sel[i]['id_kategori'] + ",";
                }
            
            }
            var array = JSON.parse("[" + name + "]");
        
           $('#kategori_berita_pop').select2({ theme:'bootstrap4' }).val(array).trigger('change');

           $('#deskripsi_view').summernote({
                                disabled:disabled,
                                placeholder: "Belum ada deskripsi"
                              }).summernote('code', berita[0]['deskripsi']);
          
        
          }
        }

      });
    })


    $("#tutup_view_berita").click(function () { 
      $("#view_file_berita tr").remove();
      $('#modal_view_berita').modal('toggle');
    });

    

    // $('#btn_view').click(function(e){
    //   e.preventDefault();

   
    //   $.ajax({
    //     data: $('form_view_berita').serialize(),
    //     url: "/admin/beritsada"

    //   });
    //   $('#modal_view_berita').modal('show');
    // });



  





   });
</script>
    
@endpush
