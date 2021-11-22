@extends('layouts.admin')
<!-- ======= Hero Section ======= -->
@section('container_admin')



<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Default box -->
        <div class="card">

            <div class="card-body">

                <form method="POST" class="form-horizontal" action="/admin/berita/{{ $id_berita }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <!-- form start -->
                    @foreach ($berita as $berita)
                    <input type='hidden' name="id_berita" id="id_berita" value="{{ $berita->id_berita  }}">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Judul Berita</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('judul_berita') is-invalid @enderror" id="judul_berita" name="judul_berita"
                                    placeholder="Masukkan Judul Berita" required autofocus value="{{ old('judul_berita',  $berita->judul ) }}" >
                                    @error('judul_berita')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                        
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Status Publish</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" style="width: 100%;" id="status_publish" name="status_publish">
                                <?php if($berita->status_publish == '1') { ?>
                                    <option  selected value="1">Terlihat</option>
                                    <option value="0">Disembunyikan</option>
                                <?php } else{ ?>
                                    <option value="1">Terlihat</option>
                                    <option selected value="0">Disembunyikan</option>

                                <?php }?>
                                 
                                    
                                  </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"> Pinned Berita</label>
                            <div class="col-sm-9">
                                <select class="form-control select2 select-pinned @error('pinned_berita') is-invalid @enderror"
                                style="width: 100%;" id="pinned_berita" name="pinned_berita" >

                                @if ($berita->status_pinned == '1')
                                <option value="1" selected> Pinned </option>
                                <option value="0"> Tidak di Pinned</option>
                                @else
                                <option value="1" > Pinned </option>
                                <option value="0" selected> Tidak di Pinned</option> 
                                @endif
                                
                               
                               


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
                                <select class="select2bs4edit form-control @error('kategori') is-invalid @enderror" multiple="multiple"
                                    data-placeholder="Filter kategori berdasarkan" style="width: 100%;"
                                    data-live-search="true" id="kategori" name="kategori[]" required >
                                    @foreach ($kategori_select as $ks)
                                    <option value="{{ $ks->id_kategori }}" selected> {{ $ks->jenis_kategori }}</option>
                                    
                                    @endforeach
                                    @foreach ($list_kategori as $list)
                                    {{-- @if(old('kategori_berita', $berita->list_id_kategori) == $list->id)
                                    <option value="{{ $list->id }}" selected> {{ $list->jenis_kategori }}</option> --}}
                                   
                                    {{-- @else --}}
                                    <option value="{{ $list->id }}" > {{ $list->jenis_kategori }}</option>
                                        
                                    {{-- @endif --}}
                                    @endforeach
                                </select>

                               
                                @error('kategori')
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
                                    id="deskripsi_berita" name="deskripsi" placeholder="Silahkan isi berita"></textarea>
                            </div>
                            @push('scripts')
    
                            <script>
                            $(document).ready(function() {
                              $('#deskripsi_berita').summernote({
                                placeholder: "Silahksdsan isi deskripsi berita"
                              }).summernote('code', '{!! $berita->deskripsi !!}');
                            });
                            
                            </script>
                            @endpush
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Upload Media</label>
                            <div class="col-sm-9">

                                <input type="hidden" name="oldImage" value="{{ $berita->foto  }}">

                                <input type="file" id="file_berita[]" name="file_berita[]"  multiple class="form-control @error('file_berita') is-invalid @enderror" accept="" value="{{ old('file_berita',  $berita->judul ) }}">
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
                    <br>
                    <button type="submit" class="btn btn-primary" style="float: right;">Ubah Berita</button>
                      
                    </div>
                    <!-- /.card-body -->
                </form>

                @endforeach

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <?php $no=1; ?>
                        <tr>  
                            <th>#</th>
                            <th>Nama File</th>
                            <th>Aksi</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($file_berita as $fb)
                        <tr>
                           
                            <td>{{ $no }}</td>
                            <td>{{ $fb->nama_foto }}</td>
                            <td>
                                <a href="{{ asset($fb->path_foto) }}" target="_blank" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-folder-open"></i></a>
                                <form method="POST" class="form-horizontal d-inline" action="{{ route('berita.destroy', $fb->id) }}" enctype="multipart/form-data">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-xs btn-danger">
                                        <i class="fas fa-trash"></i>
                                      </button>
                                     
                                  </form>
                            </td>
                          
                          
                            
                        </tr>
                
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                   
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="/admin/berita" > <button type="button" class="btn btn-secondary ">Kembali</button></a>
              
            </div>
        </div>
        


        <div class="card">

            <div class="card-body">
             
            </div>
        </div>

        





    </div>

    </div>


    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->




@endsection
