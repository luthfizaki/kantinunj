@extends ('layouts.main')

@section ('container')
<div class="row mx-0 mt-5">
            <div class="col-lg-8">
                <section class="">
                    <div class="card mb-5">
                        <div class="card-header bg-unj ">
                            <h5 class="text-white">Data Product</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-inverse table-responsive d-table">
                                    <thead>
                                        <tr>
                                            <!-- <th>No</th> -->
                                            <th>Detail Pesanan</th>
                                            <th>Penjual</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody" class="align-middle">
                                        @foreach ($transactions as $product)
                                        @if ($product->status == 'on order')
                                        <tr>
                                            <td>{{ $product->product->product_name }}</td>
                                            <td>{{ $product->author->name }}</td>
                                            <td>Rp. {{ $product->price_total }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <div class="col-lg-4">
                <section class="">
                    <div class="card mb-5">
                        <div class="card-header bg-unj text-white">
                            <h5 class="text-white">Konfirmasi Pembayaran</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-inverse table-responsive d-table">
                                    <thead>
                                        <tr>
                                            <!-- <th>No</th> -->
                                            <th>Konfirmasi</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody" class="align-middle">
                                        @foreach ($confirm as $book)
                                        <tr>
                                            <td>{{ $book->name }}</td>
                                            <td><a href="https://api.whatsapp.com/send?phone=628{{ $book->no_telpon }}&text=Format%20Konfirmasi%20:%20Nama%20Pembeli%20Metode%20pembayaran"
                                                    class=" btn btn-primary btn-sm">
                                                    Rp. {{ $book->total }}</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <div class="col-lg-7">
                <div class="container">
                    <!-- <h6 class="bg-unj" style=" padding: 10px 0px 10px 15px;color: white;">CATATAN PESANAN</h6>
                    <ul class="list-unstyled li-space-lg indent">
                        <div class="media-body">Catatan pesanan (jika ada) : </div>
                        <input type="address" name="catatan" placeholder="beri catatan..."
                            style="margin-right:1rem; margin-left: 0.75rem; width: 90%; height: 10rem">


                    </ul> -->
                    <h6 class="bg-unj" style=" padding: 10px 0px 10px 15px;color: white;">PEMBAYARAN</h6>
                    <ul class="list-unstyled li-space-lg indent">
                        <div class="media-body">Metode Pembayaran :</div>
                        @foreach ($confirm as $conf)

                        <img src="{{ asset ('https://source.unsplash.com/1200x1200?money') }}" width="20px"
                            height="20px" style="margin-right: 0.75rem; margin-left: 1rem;"><b>Dana/OVO :
                            {{ $conf->no_telpon }} a.n
                            {{ $conf->name }}</b><br>
                        @endforeach
                        <br>
                        <div class="media-body">Setelah melakukan pembayaran, <b>screenshot bukti pembayaran.</b> Lalu
                            lakukan konfirmasi ke penjual agar pesananmu dapat diproses</div>
                    </ul>
                </div>
            </div>

        </div>
<br><br>
@endsection
