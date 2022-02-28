@extends ('dashboard.layouts.main')

@section ('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Orders</h1>
                    <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div> -->
 @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    @endif
</div>    
<div class="table-responsive">
    <!-- <a href="/dashboard/products/create" class="btn btn-primary mb-3">Create new Product</a> -->
   
        <table class="table table-striped table-sm align-middle">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Pembeli</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Jumlah Pesanan</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Status</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transactions as $transaction)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $transaction->customer->name }}</td>
              <td>{{ $transaction->product->product_name }}</td>
              <td>{{ $transaction->amount }}</td>
              <td>{{ $transaction->price_total }}</td>
              <td>{{ $transaction->status }}</td>
              <td class="text-center">
                <form action="/dashboard/product/{{ $transaction->id }}" method="post" >
                @method('put')
                @csrf
                <!-- <input type="text" name="status" value="{{ $transaction->status }}"> -->
                  @if ($transaction->status == 'on order')
                    <button type="submit" class="btn btn-primary"><i class="fas fa-utensils fa-lg"></i></button>
                  @elseif ($transaction->status == 'on process')
                    <button type="submit" class="btn btn-success"><i class="fas fa-check fa-lg"></i></button>
                  @else
                    <button type="submit" class="btn btn-success" disabled><i class="fas fa-clipboard-check fa-lg"></i></button>
                  @endif
                  
                  <!-- <a href="/dashboard/products/{{ $transaction->slug }}/edit" class="badge bg-info"><span data-feather="edit"></span></a>
                  <form action="/dashboard/products/{{ $transaction->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm ('Anda Yakin ingin Menghapus??')"><span data-feather="x-circle"></span></button>
                  </form> -->
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection