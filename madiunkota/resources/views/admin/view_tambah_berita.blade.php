@extends('layouts.admin')
<!-- ======= Hero Section ======= -->
@section('container_admin')



<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Default box -->
        <div class="card">

            <div class="card-body">

                <form method="POST" class="form-horizontal" action="/admin/berita" enctype="multipart/form-data">
                    @csrf
                    <!-- form start -->

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Judul Berita</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('judul_berita') is-invalid @enderror" id="judul_berita" name="judul_berita"
                                    placeholder="Masukkan Judul Berita" required autofocus value="{{ old('judul_berita') }}" >
                                    @error('judul_berita')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                        
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"> Pinned Berita</label>
                            <div class="col-sm-9">
                                <select class="form-control select2 select-pinned @error('pinned_berita') is-invalid @enderror"
                                style="width: 100%;" id="pinned_berita" name="pinned_berita">
                                <option value="">  </option>
                                <option value="1"> Pinned </option>
                                <option value="0"> Tidak di Pinned</option>
                               


                            </select>

                            @error('pinned_berita')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                        
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Kategori Berita</label>
                            <div class="col-sm-9">
                                <select required class="select2bs4 form-control @error('kategori_berita') is-invalid @enderror" multiple="multiple"
                                    data-placeholder="Filter kategori berdasarkan" style="width: 100%;"
                                    data-live-search="true" id="kategori_berita" name="kategori_berita[]" required >
                                    @foreach ($list_kategori as $list)
                                    @if(old('kategori_berita') == $list->id)
                                    <option value="{{ $list->id }}" selected> {{ $list->jenis_kategori }}</option>
                                         
                                    @else
                                    <option value="{{ $list->id }}" > {{ $list->jenis_kategori }}</option>
                                        
                                    @endif
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
                                <textarea type="text" class="summernote form-control"
                                    id="deskripsi" name="deskripsi" placeholder="Silahkan isi berita"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Upload Media</label>
                            <div class="col-sm-9">
                                
                                <input type="file" id="file_berita[]" name="file_berita[]" required multiple class="form-control @error('file_berita') is-invalid @enderror" accept="">
                                <div id="list_file"> </div>
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


            </div>
            <div class="modal-footer">
                <a href="/admin/berita"> <button type="button" class="btn btn-secondary">Kembali</button></a>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        </form>






    </div>

    </div>


    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


@push('scripts')
<script ttype="text/javascript">

var fileInput = document.getElementById('file_berita[]');
var listFile = document.getElementById('list_file');

fileInput.onchange = function(){
    var files = Array.from(this.files);
    files = files.map(file =>file.name);
    listFile.innerHTML = files.join('<br/>');
}


</script>
@endpush

@endsection
