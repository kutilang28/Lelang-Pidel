  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        @if (Auth::user()->role == 'administrator')
          <a href="/admin/admin" class="nav-link">Home</a>
          @endif
          @if (Auth::user()->role == 'petugas')
          <a href="/admin/petugas" class="nav-link">Home</a>
          @endif
          @if (Auth::user()->role == 'masyarakat')
          <a href="/masyarakat" class="nav-link">Home</a>
          @endif
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/logout" class="nav-link">Log Out</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->