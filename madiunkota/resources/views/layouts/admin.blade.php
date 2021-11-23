
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Kota Madiun  | Dashboard</title>

  <link href="{{ asset('assets/img/Lambang_Kota_Madiun.png') }}" rel="icon">
  <link href="{{ asset('assets/img/Lambang_Kota_Madiun.png') }}" rel="apple-touch-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('template_login/css.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template_admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('template_login/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('template_admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('template_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('template_admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template_admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template_admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('template_admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('template_admin/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('template_admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('template_admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('template_admin/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('template_admin/plugins/dropzone/min/dropzone.min.css') }}">


    <link rel="stylesheet" href="{{ asset('template_login/dataTables.bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('layouts.partials.navbar_admin')
  <!-- /.navbar -->

  @include('layouts.partials.sidebar_admin')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('layouts.partials.breadcrumb_admin')
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('container_admin')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="/">Diskominfo </a>.</strong>
    Pemerintah Kota Madiun
    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div> --}}
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('template_admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template_admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template_admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('template_admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('template_admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('template_admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('template_admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('template_admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('template_admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('template_admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template_admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template_admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template_admin/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template_admin/dist/js/pages/dashboard.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('template_admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('template_admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('template_admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('template_admin/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- dropzonejs -->
<script src="{{ asset('template_admin/plugins/dropzone/min/dropzone.min.js') }}"></script>

<script src="{{ asset('template_login/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template_login/dataTables.bootstrap4.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#deskripsi').summernote({
      placeholder: "Silahkan isi deskripsi berita"
    });
  });
  
  
  
  
    $(function () {
  
      $('.select2').select2({
        theme:'bootstrap4'
      })
  
      $('.select-bidang').select2({
        theme:'bootstrap4',
        placeholder: "Masukkan Jenis OPD",
      allowClear: true
      })
  
      $('.select-pinned').select2({
        theme:'bootstrap4',
        placeholder: "Pinned Berita?",
     
      })
  
      $('.select2bs4edit').select2({
        theme:'bootstrap4'
      })
      
                                    
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4',
        
      })
  
     
     
    
    })
    
    // DropzoneJS Demo Code End
  </script>
  @stack('scripts')
</body>
</html>
