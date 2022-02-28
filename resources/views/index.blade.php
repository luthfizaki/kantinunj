@extends ('layouts.main')

@section ('container')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section class="container">
    <h4 class=" mt-4">My Carts</h4>
    <div class="card mt-5">
        <div class="card-header">
            <h5>Data Product</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-inverse table-responsive d-table">
                    <thead>
                        <tr>
                            <!-- <th>No</th> -->
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody" class="align-middle">
                        @foreach ($transactions as $product)
                        @if ($product->status == 'on cart')
                        <tr>
                            <!-- <td>{{ $loop->iteration }}</td> -->
                            <td class="product-image"><img
                                    src="{{ asset ('https://source.unsplash.com/1200x1200?foods') }}" alt=""></td>
                            <td>{{ $product->product->product_name }}</td>
                            <td>{{ $product->product->price }}</td>
                            <td class="">{{ $product->amount }}</td>
                            <td>Rp. {{ $product->price_total }}</td>
                            <td class="">
                                <form action="/dashboard/product/{{ $product->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" href="" class="btn btn-danger btn-sm">X</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <a href="/kantin" class="btn btn-primary btn-sm">Continue Shopping</a>
                                <!-- <form action="/checkout/{{ $product->customer_id }}" method="post" >
                                
                @csrf -->
                                <!-- <input type="hidden" name="_method" value="PUT">
                <input type="text" name="status" value="{{ $product->status }}"> -->
                                <a href="/checkout" class="btn bg-unj btn-sm text-white">Checkout</a>
                                <!-- </form> -->
                            </td>
                            <td colspan="2"></td>
                            <td><strong>Total Amount</strong></td>
                            <td><strong>Rp. {{ $total }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection

@push('addon-script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('js/crud.js') }}"></script>
@endpush
