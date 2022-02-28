@extends ('dashboard.layouts.main')

@section ('container')
    <div class="row">
        <div class="col-md-4 mt-5">
            @if ($product->image)
                <img src="{{ asset ('storage/' . $product->image) }}" alt="" style="height:200px; width:200px;">
            @else
                <img src="{{ asset ('https://source.unsplash.com/200x200?foods') }}" alt="">
            @endif
        </div>
        <div class="col-md-8 mt-5">
            <h3>{{ $product->product_name }}</h4>
            <h5>{{ $product->desc }}</h5>
            <p>{{ $product->author->name }} Lokasi: {{ $product->category->nama }}</p>
            <p>Rp. {{ $product->price }} Stock: {{ $product->stock }}</p>
            <a href="/dashboard/products" class="btn btn-primary">Back to all Product</a>
            <a href="/dashboard/products/{{ $product->slug }}/edit" class="btn btn-info text-white">Edit Product</a>
            <form action="/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm ('Anda Yakin ingin Menghapus??')">Delete Product</button>
            </form>
        </div>
    </div>
    <hr>
    <br>
@endsection