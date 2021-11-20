

          <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{  $title; }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @if( $child ===  '' )
              <li class="breadcrumb-item"><a href="{{ $root_parent }}">Admin</a></li>
              <li class="breadcrumb-item active">{{  $parent; }}</li>
              @else
              <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
              <li class="breadcrumb-item"><a href="{{ $root_parent }}">{{  $parent; }}</a></li>
              <li class="breadcrumb-item active">{{  $child; }}</li>
              @endif
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


