@extends ('layouts.main')

@section ('container')
<div id="contact" class="form-2" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 style="color: #a4cc44;">Kontak Kami</h2>
                <ul class="list-unstyled li-space-lg">
                    <li class="address">Tanya sesuatu, kritik, atau saran</li>
                    <li><i class="fas fa-map-marker-alt"></i>Jl. Rawamangun Muka Raya, RT.11/RW.14, Rawamangun, Kec.
                        Pulo Gadung,Kota Jakarta Timur, DKI Jakarta 13220</li><br>
                    <li><i class="fas fa-phone"></i><a href="tel:003024630820"
                            style="text-decoration:none;padding-right: 30px;padding-left: 10px;">+628 720 2212</a><i
                            class="fas fa-envelope"></i><a href="gmail.com"
                            style="text-decoration: none;padding-left: 10px;">Ekantinunj2@unj.ac.id</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="map-responsive">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3853.600047721451!2d106.8759918134353!3d-6.195026100156949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4ed14403213%3A0x2412a91a0f6a01c8!2sUniversitas%20Negeri%20Jakarta!5e0!3m2!1sid!2sid!4v1603681330850!5m2!1sid!2sid"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6">

                <!-- Contact Form -->
                <div class="contactForm">
                    <form>
                        <h2>Kirim Pesan</h2>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Nama Lengkap</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <textarea required=""></textarea>
                            <span>Tulis Pesan...</span>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="" value="KIRIM">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



</div>
</div>
</div>
</div>
</div>
@endsection
