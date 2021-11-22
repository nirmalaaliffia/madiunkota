@extends('layouts.admin')
<!-- ======= Hero Section ======= -->
@section('container_admin')

<!-- Main content -->
<section class="content" style="margin-left: 50px;margin-right:50px;">

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

                {{-- <div class="col-auto">
                    <button id="btn_edit_profil"  type="button" onclick="toggle();" class="btn btn-block btn-primary"><i class="fa fa-edit "></i>&ensp; Edit</button>
                </div> --}}
            </div>



            <br>
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="tab-profil" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active" id="custom-tabs-one-sejarah-tab" data-toggle="pill"
                                href="#sejarah" role="tab" aria-controls="sejarah-tab"
                                aria-selected="true">Sejarah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-visi-tab" data-toggle="pill"
                                href="#visi-misi" role="tab" aria-controls="visi-misi-tab"
                                aria-selected="false">Visi Misi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-profil-tab" data-toggle="pill"
                                href="#profil-pimpinan" role="tab" aria-controls="profil-pimpinan-tab"
                                aria-selected="false">Profil Pimpinan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-wilayah-tab" data-toggle="pill"
                                href="#wilayah-geografis" role="tab" aria-controls="wilayah-geografis-tab"
                                aria-selected="false">Wilayah Geografis</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="tabb-profil-tabContent">
                        <div class="tab-pane fade show active" id="sejarah" role="tabpanel"
                            aria-labelledby="sejarah-tab">
  
                            <form method="POST" id="edit_sejarah" class="form-horizontal" action="/admin/profil/update_sejarah" enctype="multipart/form-data">
                              
                                @csrf
                                <input type="hidden" class="form-control" id="id_sejarah" name="id_sejarah" value="1" >
                            <textarea  type="text" class="summernote form-control  @error('deskripsi_sejarah') is-invalid @enderror"
                            id="deskripsi_sejarah" name="deskripsi_sejarah" placeholder="Silahkan isi sejarah"></textarea>
                            @push('scripts')

                            <script>
                            $(document).ready(function() {
                              $('#deskripsi_sejarah').summernote({
                                placeholder: "Silahksdsan isi deskripsi berita"
                              }).summernote('code', '{!! $profil['0']->deskripsi !!}');
                            });
                            
                            </script>
                            @endpush
                            @error('deskripsi_sejarah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                                
                            @enderror
                            

                            <div class="col-md-2" >
                                <button type="submit" id='update_sejarah' class="btn btn-block btn-success"><i class="fa fa-edit "></i>&ensp;Update</button>
                            </div>
                        </form>
                        </div>
                        <div class="tab-pane fade" id="visi-misi" role="tabpanel"
                            aria-labelledby="visi-misi-tab">
                            <form method="POST" id="edit_visi_misi" class="form-horizontal" action="/admin/profil/update_visi_misi" enctype="multipart/form-data">
                              
                                @csrf
                                <input type="hidden" class="form-control" id="id_visi_misi" name="id_visi_misi" value="2" >
                                
                            <textarea  type="text" class="summernote form-control @error('visi_misi') is-invalid @enderror"
                            id="visi_misi" name="visi_misi" placeholder="Silahkan isi Visi Misi"></textarea>
                           
                            @push('scripts')

                            <script>
                            $(document).ready(function() {
                              $('#visi_misi').summernote({
                                placeholder: "Silahksdsan isi visi misi"
                              }).summernote('code', '{!! $profil['1']->deskripsi !!}');
                            });
                            
                            </script>
                            @endpush

                            @error('visi_misi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                                
                            @enderror
                            <div class="col-md-2" >
                                <button type="submit" id="btn_visi_misi" class="btn btn-block btn-success"><i class="fa fa-edit "></i>&ensp;Update</button>
                            </div>
                        </form>
                        </div>
                        <div class="tab-pane fade" id="profil-pimpinan" role="tabpanel"
                            aria-labelledby="profil-pimpinan-tab">
                            <form method="POST" id="edit_profil_pimpinan" class="form-horizontal" action="/admin/profil/update_profil_pimpinan" enctype="multipart/form-data">
                              
                                @csrf
                                <input type="hidden" class="form-control " id="id_profil_pimpinan" name="id_profil_pimpinan" value="3" >
                            <textarea  type="text" class="summernote form-control @error('profil_pimpinan') is-invalid @enderror"
                            id="profil_pimpinan" name="profil_pimpinan" placeholder="Silahkan isi Profil Pimpinan"></textarea>
                           
                            @push('scripts')

                            <script>
                            $(document).ready(function() {
                              $('#profil_pimpinan').summernote({
                                placeholder: "Silahksdsan isi profil pimpinan"
                              }).summernote('code', '{!! $profil['2']->deskripsi !!}');
                            });
                            
                            </script>
                            @endpush
                           
                            @error('profil_pimpinan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                                
                            @enderror
                            <div class="col-md-2" >
                                <button type="submit" id="btn_profil_pimpinan" class="btn btn-block btn-success">Update</button>
                            </div>
                        </form>
                        </div>
                        <div class="tab-pane fade" id="wilayah-geografis" role="tabpanel"
                            aria-labelledby="wilayah-geografis-tab">
                            <form method="POST" id="edit_wilayah_geografis" class="form-horizontal" action="/admin/profil/update_wilayah_geografis" enctype="multipart/form-data">
                              
                                @csrf
                                <input type="hidden" class="form-control" id="id_wilayah_geo" name="id_wilayah_geo" value="4" >
                                
                            <textarea  type="text" class="summernote form-control @error('wilayah_geografis') is-invalid @enderror"
                            id="wilayah_geografis" name="wilayah_geografis" placeholder="Silahkan isi Wilayah Geografis"></textarea>
                           
                            @push('scripts')

                            <script>
                            $(document).ready(function() {
                              $('#wilayah_geografis').summernote({
                                placeholder: "Silahksdsan isi wilayah geografis"
                              }).summernote('code', '{!! $profil['3']->deskripsi !!}');
                            });
                            
                            </script>
                            @endpush

                            @error('wilayah_geografis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                                
                            @enderror
                            <div class="col-md-2" >
                                <button type="submit" id="wilayah_geografis" class="btn btn-block btn-success"><i class="fa fa-edit "></i>&ensp;Update</button>
                            </div>
                        </form>
                        </div>
                      
                        
                    </div>
         
                </div>
                <!-- /.card -->
            </div>


        </div>

    </div>

    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

@endsection


@push('scripts')


<script ttype="text/javascript">
$(document).ready(function(){
    $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
        localStorage.setItem('active', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('active');
    if(activeTab){
        $('#tab-profil a[href="' + activeTab + '"]').tab('show');
    }
});

        $(document).ready(function(){
        
            //$('#deskripsi_sejarah').attr('disabled','disabled');
           

    
         

       });

      
    
    </script>
        


    
@endpush