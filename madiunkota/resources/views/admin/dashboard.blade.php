@extends('layouts.admin')
<!-- ======= Hero Section ======= -->
@section('container_admin')
    
   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
     
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $berita[0]->jumlah_berita }}</h3>

              <p>Jumlah Berita</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-newspaper"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $ipkd[0]->jumlah_ipkd }}</h3>

              <p>Jumlah IPKD</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-balance-scale"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $opd[0]->jumlah_opd }}</h3>

              <p>Jumlah OPD</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-building"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $user[0]->jumlah_user }}</h3>

              <p>Jumlah User</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-users"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $tabloid[0]->jumlah_tabloid }}</h3>

              <p>Jumlah Tabloid</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-book-open"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $pengumuman[0]->jumlah_pengumuman }}</h3>

              <p>Jumlah Pengumuman</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-chalkboard"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $lowongan[0]->jumlah_lowongan }}</h3>

              <p>Jumlah Lowongan</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-dungeon"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $informasi[0]->jumlah_informasi }}</h3>

              <p>Jumlah Informasi</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-info"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $dokumen[0]->jumlah_dokumen }}</h3>

              <p>Jumlah Dokumen</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-file-alt"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $arsip[0]->jumlah_arsip }}</h3>

              <p>Jumlah Arsip</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-box-open"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $kegiatan_pemkot[0]->jumlah_kegiatan_pemkot }}</h3>

              <p>Jumlah Kegiatan Pemkot</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-glass-cheers"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $kegiatan_walikota[0]->jumlah_kegiatan_walikota }}</h3>

              <p>Jumlah Kegiatan Walikota</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-handshake"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
      </div>
     
    </div><!-- /.container-fluid -->
  </section>
    @endsection