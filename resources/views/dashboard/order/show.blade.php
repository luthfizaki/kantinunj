@extends ('dashboard.layouts.main')

@section ('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product</h1>
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
</div>
<div class="col-lg-8">
    <form action="" method="post" enctype="multipart/form-data">
    @method ('put')
    @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error ('product_name') is-invalid @enderror" id="name" placeholder="" name="product_name" required value="{{ old('product_name', $product->product->product_name) }}">
            @error ('product_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Slug</label>
            <input type="text" class="form-control @error ('slug') is-invalid @enderror" id="slug" placeholder="" name="slug" required value="{{ old('slug', $product->slug) }}">
            @error ('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="image" class="form-label">Upload Gambar</label>
                <input type="hidden" name="oldimage" value="{{ $product->image }}">
                @if ($product->image)
                    <img src="{{ asset ('storage/' . $product->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" id="img">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block" id="img">
                @endif
                <input class="form-control form-control-sm @error ('image') is-invalid @enderror" id="image" type="file" name="image" onchange="lihatImage()">
                @error ('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Lokasi Kantin</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
            @foreach ($categories as $category)
                @if (old('category_id',  $product->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                @else
                    <option value="{{ $category->id }}" >{{ $category->nama }}</option>
                @endif
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk</label>
            <textarea class="form-control @error ('desc') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="desc">{{ old('desc', $product->desc) }}</textarea>
            @error ('desc')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga</label>
            <input type="Number" class="form-control @error ('price') is-invalid @enderror" id="slug" placeholder="" name="price" required value="{{ old('price', $product->price) }}">
            @error ('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stock</label>
            <input type="number" class="form-control @error ('stock') is-invalid @enderror" id="slug" placeholder="" name="stock" required value="{{ old('stock', $product->stock) }}">
            @error ('stock')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn btn-primary mb-3" type="submit">Update Product</button>
    </form>
</div>

<script>
    const name = document.querySelector ('#name');
    const slug = document.querySelector ('#slug');

    name.addEventListener('change', function () {
        fetch ('/dashboard/products/checkslug?name=' + name.value)
        .then(response => response.json())
        .then(data=>slug.value = data.slug)
    })

    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            img.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
