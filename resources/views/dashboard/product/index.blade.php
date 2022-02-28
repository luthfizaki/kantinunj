@extends ('dashboard.layouts.main')

@section ('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Products</h1>
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
    <a href="/dashboard/products/create" class="btn btn-primary mb-3">Create new Product</a>
   
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Products</th>
              <th scope="col">Harga</th>
              <th scope="col">Stock</th>
              <th scope="col">Lokasi</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->stock }}</td>
              <td>{{ $product->category->nama }}</td>
              <td class="text-center">
                  <a href="/dashboard/products/{{ $product->slug }}" class="badge bg-primary"><span data-feather="eye"></span></a>
                  <a href="/dashboard/products/{{ $product->slug }}/edit" class="badge bg-info"><span data-feather="edit"></span></a>
                  <form action="/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm ('Anda Yakin ingin Menghapus??')"><span data-feather="x-circle"></span></button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection