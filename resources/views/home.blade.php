@extends ('layouts.main')

@section ('slider')
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(46).jpg"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive" style="color: #a4cc44;">Pesan Makanan Tanda Perlu Ngantri</h3>
        <!-- <p>First text</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="{{ asset ('img/slider1.jpg') }}"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Cukup dengan Smartphone anda bisa membeli makanan</h3>
        <!-- <p>Secondary text</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="{{ asset ('img/slider2.jpg') }}"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive text-white">Pesan Bayar Ambil</h3>
        <p class="text-white">Pesan dimana pun lalu bayar dan ambil tanpa ribet</p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->
<!--/.Carousel Wrapper-->
@endsection

@section ('container')
  <div class="text-center mt-5">
    <h3 class="mb-3">PESAN MAKANAN MUDAH TANPA ANTRI</h3>
    <hr class="container" style="width:50%", size="5", color=green>
    <h5 class="">Selamat datang di E-Kantin UNJ. E-Kantin UNJ akan memberikan kemudahan dalam memesan makanan tanpa harus mengantri. E-Kantin UNJ akn memberikan kamu informasi menu makanan yang tersedia di berbagai kantin yang ada di Universitas Negeri Jakarta</h5>
    <button type="button" class="btn btn-success mt-3">
      Baca Selengkapnya
    </button>
  </div>

  <div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="unj-text">Kantin</span> UNJ</h3>
						<p>Nikmati berbagai macam makanan dan minuman di kantin favorit anda</p>
					</div>
				</div>
			</div>
  
			<div class="row">
        @foreach ($categories as $category)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="#"><img src="{{ asset ('img/slider1.jpg') }}" alt=""></a>
						</div>
						<h3>{{ $category->nama }}</h3>
						<!-- <p class="product-price"><span>Per Kg</span> 85$ </p> -->
						<a href="/kantin?category={{ $category->slug }}" class="cart-btn">LIHAT MENU</a>
					</div>
				</div>
        @endforeach
			</div>
		</div>
	</div>

  <div class="product-section mt-100 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="unj-text">Menu</span> Baru</h3>
						<p>Nikmati berbagai macam makanan dan minuman di kantin favorit anda</p>
					</div>
				</div>
			</div>
  
			<div class="row">
        @foreach ($products->take(3) as $product)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
            

						<div class="product-image mb-4" style="height:250px; overflow:hidden;">
							@if ($product->image)
              <!-- <input typye="text" name="id" value="$product->id"> -->
								<a href="/product/{{$product->slug }}"><img src="{{ asset ('storage/' . $product->image) }}" alt="" ></a>

							@else
								<a href="/product/{{$product->slug }}"><img src="{{ asset ('https://source.unsplash.com/1200x1200?foods') }}" alt="" ></a>
							@endif
						</div>
						<h3><a href="/product/{{$product->slug }}" class="text-dark"style="text-decoration:none;">{{ $product->product_name }}</a></h3>
						<p class="product-price"><span>Rp. {{ $product->price }}</span></p>
						<a href="/product/{{$product->slug }}" class="cart-btn">Lihat Makanan</a>
					</div>
				</div>
        
        @endforeach
			</div>
		</div>
	</div>
  
@endsection