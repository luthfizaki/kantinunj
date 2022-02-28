@extends ('layouts.main')

@section ('container')
    
    <div class="row">
        <div class="col-md-4 mt-5">
            @if ($post->image)
                <img src="{{ asset ('storage/' . $post->image) }}" alt="" style="height:200px; width:200px;">
            @else
                <img src="{{ asset ('https://source.unsplash.com/200x200?foods') }}" alt="">
            @endif

        </div>
        <div class="col-md-8 mt-5">
            <form action="/product/add-to-cart" method="post">
        @csrf
            <input type="hidden" name="id" value="{{ $post->id }}">
            <input type="hidden" name="user_id" value="{{ $post->user_id }}">
            <input type="hidden" name="category_id" value="{{ $post->category_id }}">
            <input type="hidden" name="price" value="{{ $post->price }}">
            <h3>{{ $post->product_name }}</h4>
            <h5>{{ $post->desc }}</h5>
            <p>{{ $post->author->name }} Lokasi: {{ $post->category->nama }}</p>
            <!-- <div class="col-md-3 input-group input-group-sm mb-3">
  <div class="input-group-prepend ">
    <span class="input-group-text" id="inputGroup-sizing-sm">Quantity</span>
  </div> -->
  <input type="number" class="form-control" aria-label="Small" name="amount" aria-describedby="inputGroup-sizing-sm" data-min="1" value="1">
<!-- </div> -->
            <p>Rp. {{ $post->price }} Stock: {{ $post->stock }}</p>
            <button class="btn bg-unj text-white" type="submit"><i class="fas fa-shopping-cart"></i> Pesan</button>
        </div>
    </div>
</form>
    <hr>
    <br>


    <h3 class="mb-4">Menu Lain di E-Kantin UNJ</h3>
    <div class="product-section mb-150">
    <div class="container">
<div class="row">   
        @foreach ($products as $menu)
        <div class="col-lg-4 col-md-6 text-center mb-3">
            <div class="single-product-item">
                <div class="position-absolute px-3 py-2 text-white bg-unj">
                    <a href="/kantin?category={{ $menu->category->slug }}" class="text-white" style="text-decoration:none;"> {{ $menu->category->nama }}</a>
                </div>
                <div class="product-image mb-4" style="height:250px; overflow:hidden;">
                    @if ($menu->image)
                        <a href="/product/{{$menu->slug }}"><img src="{{ asset ('storage/' . $menu->image) }}" alt="" ></a>

                    @else
                        <a href="/product/{{$menu->slug }}"><img src="{{ asset ('https://source.unsplash.com/1200x1200?foods') }}" alt="" ></a>
                    @endif
                </div>
                <p class="ms-4 text-start">Penjual: {{ $menu->author->name }}</p>
                <p class="ms-4 text-start">{{ $products[0]->created_at->diffForHumans() }}</p>
                <h4><a href="/product/{{$menu->slug }}" class="text-dark"style="text-decoration:none;">{{ $menu->product_name }}</a></h4>
                <p class="product-price"><span>Rp. {{ $menu->price }}</span></p>
                <a href="/product/{{$menu->slug }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Pesan</a>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</div>


@endsection