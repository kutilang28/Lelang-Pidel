@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah barang</li>
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
              <h3 class="card-title">Tambah barang</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="{{url('items', $items->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Nama Barang</label>
                    <input type="text" name="name" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Deskripsi barang</label>
                    <textarea id="inputDescription" name="description" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="inputClientCompany">Harga Lelang</label>
                    <input type="number" name="starting_bid" id="inputClientCompany" class="form-control">
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success float-right">Tambah Barang</button>
        </div>
    </div>
        </form>
    </section>
    <!-- /.content -->
  </div>

@include('layouts.footer')
