@extends ('layouts.main')

@section ('container')
<div class="row justify-content-center">
    <div class="col-md-6 mt-4">
        <form action="/kantin">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>
@if ($products->count())
<div class="card mb-2 mt-2">
    <!-- <img src="https://source.unsplash.com/1200x400?foods" class="card-img-top" alt="..."> -->
    @if ($products[0]->image)
        <img src="{{ asset ('storage/' . $products[0]->image) }}" class="card-img-top" alt="" style="max-height:400px; overflow:hidden;">
    @else
        <img src="https://source.unsplash.com/1200x400?foods" class="card-img-top" alt="...">
    @endif
    <div class="card-body text-center">
        <h3 class="card-title">{{ $products[0]->product_name }}</h3>
        <small class="text-muted">  
            <p>Penjual : {{ $products[0]->author->name }} </p>
            <p class="product-price"><span>Rp. {{ $products[0]->price }}</span><span
                    class="text-right">{{ $products[0]->created_at->diffForHumans() }}</span></p>
        </small>

        <p class="card-text">{{ $products[0]->desc }}</p>
        <a href="/product/{{$products[0]->slug }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Pesan</a>
    </div>
</div>


<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            @foreach ($products->skip(1) as $menu)
            <div class="col-lg-4 col-md-6 text-center mb-3">
                <div class="single-product-item">
                    <div class="position-absolute px-3 py-2 text-white bg-unj">
                        <a href="/kantin?category={{ $menu->category->slug }}" class="text-white" style="text-decoration:none;"> {{ $menu->category->nama }}</a>
                    </div>
                    <div class="product-image mb-4" style="height:250px; overflow:hidden;">
                        @if ($menu->image)
                        <a href="/product/{{$menu->slug }}"><img src="{{ asset ('storage/' . $menu->image) }}" alt="" ></a>

                        @else
                        <a href="/product/{{$menu->slug }}"><img src="{{ asset ('https://source.unsplash.com/1200x1200?foods') }}" alt=""></a>
                        @endif
                    </div>
                    <p class="ms-4 text-start">Penjual: {{ $menu->author->name }}</p>
                    <p class="ms-4 text-start">{{ $menu->created_at->diffForHumans() }}</p>
                    <h4><a href="/product/{{$menu->slug }}" class="text-dark"style="text-decoration:none;">{{ $menu->product_name }}</a></h4>
                    <p class="product-price"><span>Rp. {{ $menu->price }}</span></p>
                    <a href="/product/{{$menu->slug }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Pesan</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@else
    <p clas="text-center fs-4">No Found </p>
@endif

<div class="d-flex justify-content-center mt-0">
    {{ $products->links() }}
</div>


@endsection
