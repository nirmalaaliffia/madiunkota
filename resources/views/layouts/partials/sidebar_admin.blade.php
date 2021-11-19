   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/img/Lambang_Kota_Madiun.png') }}" alt="Logo Madiun" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Kota Madiun</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
             <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/admin/berita" class="nav-link {{ Request::is('admin/berita*') ? 'active':'' }}">
              <i class="nav-icon fas fa-copy"></i>
              
              <p>
                Daftar Berita
                {{-- <span class="badge badge-info right">2</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/ipkd" class="nav-link {{ Request::is('admin/ipkd*') ? 'active':'' }}">
              <i class="nav-icon fas fa-archive"></i>
              
              <p>
                Daftar IPKD
                {{-- <span class="badge badge-info right">2</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/profil" class="nav-link {{ Request::is('admin/profil*') ? 'active':'' }}">
              <i class="nav-icon far fa-address-card"></i>
              <p>
                Profil Kota Madiun
                {{-- <span class="badge badge-info right">2</span> --}}
              </p>
            </a>
          </li>

        
          <li class="nav-item">
            <a href="/admin/opd" class="nav-link {{ Request::is('admin/opd*') ? 'active':'' }}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Daftar OPD
                {{-- <span class="badge badge-info right">2</span> --}}
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/admin/user" class="nav-link {{ Request::is('admin/user*') ? 'active':'' }}">
              <i class="nav-icon fas fa-child"></i>
              <p>
                Daftar User
                {{-- <span class="badge badge-info right">2</span> --}}
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>