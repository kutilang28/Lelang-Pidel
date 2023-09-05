  @include('layouts.header')
  @include('layouts.navbar')
  @include('layouts.sidebar')
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>E-commerce</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">E-commerce</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <style>
          .product_img-box img {
              width: 550px;
              height: 550px;
              object-fit: cover; /* This will make sure that the image covers the entire dimension of the container without stretching. */
              display: block;    /* This ensures there are no line breaks or spaces around the image. */
          }
      
          .product_img-box {
              width: 550px;
              height: 550px;
              overflow: hidden; /* This ensures that if an image is bigger than the container, it will be clipped. */
              position: relative; /* This is necessary to ensure the <span> positions itself relative to this box */
          }
      
          .product_img-box span {
              position: absolute; 
              bottom: 10px; /* Positioning the span at the bottom of the image box */
              left: 10px; /* Some spacing from the left */
          }
      </style>
        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">LOWA Mens Renegade GTX Mid Hiking Boots Review</h3>
                <div class="col-12 product_img-box">
                  <img src="{{asset('img/'.$item->foto)}}" class="product-image" alt="Product Image">
                </div>
              </div>
              <div class="col-12 col-sm-6">  
                @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
                @endif
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
                <h3 class="my-3">{{ $item->name }}</h3>
                <p>{{ $item->description }}</p>
                <br>
                <h2>JADWAL TUTUP LELANG: {{ $item->end_time }}</h2>

                <hr>

                <div class="bg-gray py-2 px-3 mt-4">
                  <h2 class="mb-0">
                    Tawaran Tertinggi @currency($highestBid ? $highestBid->amount : $item->starting_bid)
                  </h2>
                  <h4 class="mt-2">
                    Harga Tawaran Awal: @currency($item -> starting_bid)
                </h4>
                
              </div>
              
              @if(Carbon\Carbon::now() > $item->end_time)
              <div class="alert alert-warning">
                  Tawaran ini sudah selesai!
              </div>
          @else
              <!-- Your bid form and other content related to the ongoing auction can go here -->
              <div class="mt-4">
                  <form action="{{ route('bid.store', $item->id) }}" method="POST">
                      @csrf
                      <label for="bid_amount">Tawaran Anda:</label>
                      <input type="number" name="items_id" id="items_id" value="{{ $item->id }}" hidden>
                      <input type="datetime-local" name="end_time" id="end_time" value="{{ $item->end_time }}" hidden>
                      <input type="number" name="starting_bid" id="starting_bid" value="{{ $item->starting_bid }}" hidden>
                      <input type="number" min="{{ $item->starting_bid }}" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Harga Tawaran Harus Melebihi Harga Lelang')" name="amount" class="form-control mb-2" placeholder="Harga Tawaran" required="">
                      <button type="submit" class="btn btn-primary">Taruh Tawaran</button>
                  </form>
              </div>
          @endif
          

              </div>
            </div>
            <div class="row mt-4">
              <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                  <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                </div>
              </nav>
              <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{ $item->description }}</div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>

    
  @include('layouts.footer')