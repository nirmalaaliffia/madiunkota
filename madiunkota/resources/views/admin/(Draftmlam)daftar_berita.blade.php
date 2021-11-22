@extends('layouts.main_admin')
<!-- ======= Hero Section ======= -->
@section('container_admin')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Default box -->
        <div class="card">

            <div class="card-body">


                <div class="row">


                    <div class="col-md-8">
                        <div class="row">
                            {{-- @dd($list_kategori) --}}
                            <label for="inputPassword" class="col-auto col-form-label"> Kategori Berita</label>
                            <div class="col-sm-5">

                              <div class="form-group">
                                <label>Minimal</label>
                                <select class="form-control select2bs4" style="width: 100%;">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                              </div>
                                {{-- <select class="form-control selectpicker"
                                    data-none-selected-text="Filter berdasarkan Kategori " style="width: 100%;"
                                    name="filter_kategori" multiple data-live-search="true">
                                    @foreach ($list_kategori as $list)
                                    <option value="{{ $list->id }}"> {{ $list->jenis_kategori }}</option>
                                    @endforeach
                                </select> --}}
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn right-block btn-primary ">Filter</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <button type="button" class="btn right-block btn-success " data-toggle="modal"
                            data-target="#modal_tambah_berita"><i class="fa fa-plus"></i>&ensp; Tambah Berita Baru
                        </button>
                    </div>


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
                            <td>{{ $berita->array_kategori }}</td>
                            <td>{{ date('d M Y', strtotime($berita->created_at)) }}</td>
                            <td>{{  $berita->name }}</td>
                            <td><button type="button" class="btn btn-xs btn-warning" data-toggle="modal"
                                    data-target="#modal_edit_berita">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button type="button" class="btn btn-xs btn-info" data-toggle="modal"
                                    data-target="#modal_view_berita">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <button type="button" class="btn btn-xs btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach


                    </tbody>

                    </tfoot>
                </table>




            </div>

        </div>



    </div><!-- /.container-fluid -->
</section>



<!-- Modal -->
<div class="modal fade" id="modal_edit_berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
</section>
<!-- END MODAL EDIT -->

<!-- Modal  BERITA-->
<div class="modal fade" id="modal_view_berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
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
</section>
<!-- END MODAL VIEW BERITA -->


<!-- Modal  TAMBAH BERITA-->
<div class="modal fade" id="modal_tambah_berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Berita Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
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
                <select class="form-control selectpicker" data-none-selected-text="Pilih Kategori Berita " style="width: 100%;" name="filter_kategori" multiple data-live-search="true">
                  @foreach ($list_kategori as $list)
                  <option value="{{ $list->id }}"> {{ $list->jenis_kategori }}</option>
                  @endforeach    
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-3 col-form-label">Deskripsi</label>
              <div class="col-sm-9">
                <textarea id="summernote" class="summernote">
                  Place <em>some</em> <u>text</u> <strong>here</strong>
                </textarea>
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
</section>
<!-- END MODAL TAMBAH  BERITA -->
@endsection


@push('script')




@endpush