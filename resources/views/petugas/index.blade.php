@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
            <div class="card-tools">
              <a href="{{route('petugas.create')}}" class="btn btn-success">tambah data petugas<i class="fas fa-plus-square"></i></a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">id petugas</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                    <tr>
                      <td>{{$item -> id}}</td>
                      <td>{{$item -> name}}</td>
                      <td>{{$item -> email}}</td>
                      <td>{{$item -> password}}</td>
                      <td>{{$item -> created_at}}</td>
                      <td>
                        <form action="{{ route('petugas.destroy', $item->id)  }}" method="POST">
                          <a class="btn btn-warning" href="{{route('petugas.edit', $item->id)}}">Edit</a>
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
  </div>

@include('layouts.footer')