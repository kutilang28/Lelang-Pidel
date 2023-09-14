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
              <li class="breadcrumb-item active">Edit barang</li>
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
              <h3 class="card-title">Edit barang</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="{{url('itempet', $itempet->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Nama Barang</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{$itempet->name}}">
                </div>
                <div class="form-group">
                  <label for="inputDescription">Deskripsi barang</label>
                  <textarea id="inputDescription" name="description" class="form-control" rows="4">{{$itempet->description}}</textarea>
                </div>
                <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" name="foto" id="foto" class="form-control" value="{{ $itempet->foto }}">
                </div>
                <div class="form-group">
                  <label for="end_time">Tanggal terakhir lelang</label>
                  <input type="datetime-local" name="end_time" class="form-control" id="end_time" required value="{{ $itempet->end_time }}">
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Harga Lelang</label>
                  <input type="number" name="starting_bid" id="inputClientCompany" class="form-control" value="{{$itempet->starting_bids}}">
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" value="active" checked>
                  <label class="form-check-label">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="inactive">
                    <label class="form-check-label">Inactive</label>
                </div>
              </div>
              <!-- /.card-body -->
          </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{route('itempet.index')}}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success float-right">Tambah Barang</button>
        </div>
    </div>
        </form>
    </section>
    <!-- /.content -->
  </div>

@include('layouts.footer')
