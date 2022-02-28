@extends ('layouts.main')

@section ('container')

<div class="ex-basic-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="text-container">
                    <h3 style="text-align:center; color:#a4cc44">E-KANTIN UNJ </h3><br>
                    <p>E-Kantin UNJ adalah platform berbasis website yang bertujuan untuk memberi kemudahan dalam
                        memesan makanan tanpa harus mengantri. E-Kantin UNJ akan memberikan kamu informasi menu makanan
                        yang tersedia di berbagai kantin yang ada di Universitas Negeri Jakarta</p><br>

                    <h6>Berikut adalah cara melakukan pemesanan melalui E-Kantin UNJ :</h6>
                    <ul class="list-unstyled li-space-lg indent">
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Pilih menu makanan atau minuman yang kamu mau dengan mengklik menu
                                <b>'KANTIN'</b>. Disana terdapat berbagai pilihan kantin, stand serta pilihan makanan
                                dan minuman yang bisa kamu pesan.</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Klik pesan menu makanan, lalu tentukan jumlah makanan yang ingin
                                kamu pesan. Setelah itu masukkan menu tersebut ke keranjang.</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Kamu dapat memesan beberapa menu makanan hanya di satu stand yang
                                sama.</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Setelah itu, kamu bisa melakukan pembayaran menggunakan media yang
                                tersedia.</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Tunggu pesananmu diproses dan nanti akan ada notifikasi bahwa
                                pesanan kamu telah selesai dibuat.</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Terakhir, kamu bisa pergi ke stand tempat kamu memesan dan mengambil
                                pesanan kamu.</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end of text-container -->


<div id="about" class="basic-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="text-align:center; color:#a4cc44">TENTANG TEAM </h3><br><br>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Team Member -->
                <div class="team-member">
                    <div class="image-wrapper">
                        <center><img class="img-fluid" src="{{ asset ('img/arasyi.jpeg') }}" alt="alternative"></center>
                    </div> <!-- end of image-wrapper -->
                    <p class="p-large"><strong>Arasyi Diipseno .R</strong></p>
                    <p class="job-title">1512618040</p>
                    <span class="social-icons">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x facebook"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x twitter"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                    </span>
                </div>


                <!-- Team Member -->
                <div class="team-member">
                    <div class="image-wrapper">
                        <img class="img-fluid" src="{{ asset ('img/rizky.jpeg') }}" alt="alternative">
                    </div> <!-- end of image wrapper -->
                    <p class="p-large"><strong>Rizky Ramadhan .F</strong></p>
                    <p class="job-title">1512618059</p>
                    <span class="social-icons">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x facebook"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x twitter"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                    </span>
                </div>

                <!-- Team Member -->
                <div class="team-member">
                    <div class="image-wrapper">
                        <img class="img-fluid" src="{{ asset ('img/luthfi.jpeg') }}" alt="alternative">
                    </div> <!-- end of image wrapper -->
                    <p class="p-large"><strong>Luthfi </strong></p>
                    <p class="p-large"><strong>Arzaki </strong></p>
                    <p class="job-title">1512619001</p>
                    <span class="social-icons">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x facebook"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x twitter"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                    </span>
                </div>


                <!-- Team Member -->
                <div class="team-member">
                    <div class="image-wrapper">
                        <img class="img-fluid" src="{{ asset('img/intan.png') }}" alt="alternative">
                    </div> <!-- end of image wrapper -->
                    <p class="p-large"><strong>Intan Ramadhanti</strong></p>
                    <p class="job-title">1512619007</p>
                    <span class="social-icons">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x facebook"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x twitter"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
