@include('layouts.header')
<center>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href=""><b>Admin</b>LTE</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
          @if ($errors->any())
            <div class="alert alert-danger">
             <ul>
              @foreach ($errors->all() as $item)
                  <li>{{$item}}</li>
              @endforeach
             </ul>
            </div>
           @endif
          <form action="" method="POST">
            @csrf
            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <p class="mb-0">
            <a href="/register" class="text-center">Register a new membership</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
    
    <!-- jQuery -->
    <script src="{{asset('AdminLTE-3.2.0')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('AdminLTE-3.2.0')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('AdminLTE-3.2.0')}}/dist/js/adminlte.min.js"></script>
    </body>
</html>