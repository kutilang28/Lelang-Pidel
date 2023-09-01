@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit petugas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit petugas</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="{{url('petugas', $petugas->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $petugas->name }}">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $petugas->email }}">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Password</label>
                    <input type="text" name="password" id="password" class="form-control" value="{{ $petugas->password }}">
                  </div>
                  <input type="text" name="role" id="role" value="petugas" hidden> 
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{route('items.index')}}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success float-right">Tambah Barang</button>
        </div>
    </div>
        </form>
    </section>
    <!-- /.content -->
  </div>

@include('layouts.footer')
