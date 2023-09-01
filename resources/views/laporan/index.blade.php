@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Lelang</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID Item</th>
                  <th>Nama Item</th>
                  <th>ID Pemenang</th>
                  <th>Nama Pemenang</th>
                  <th>Tawaran Pemenang</th>
                  <th>Tanggal Pemenang</th> 
                </tr>
              </thead>
              <tbody>
                @foreach($endedAuctions as $auction)
                    <tr>
                      <td>{{ $auction->product_id }}</td>
                      <td>{{ $auction->item_name }}</td>
                      <td>{{ $auction->winner_id }}</td>
                      <td>{{ $auction->winner_name }}</td>
                      <td>@currency($auction -> winning_amount)</td>
                      <td>{{ $auction->winning_date }}</td>
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