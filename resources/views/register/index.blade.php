@extends ('layouts.main')

@section ('container')
<section class="vh-100 mb-5" style="background-color: white;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <h3 class="mb-5 text-center text-dark">Selamat Datang di E-Kantin UNJ</h3>
                <!-- <h3 class="mb-5 text-center text-light">E-Kantin UNJ</h3> -->
                <form action="/register" method="post">
                @csrf
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">
    
                            <h3 class="mb-5 text-center">Register</h3>
                            
                            <div class="form-outline input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"
                                        style="color: #508bfc;"></i></span>
                                <input type="text" name="name" id="typeEmailX-2" class="form-control form-control-lg @error ('name') is-invalid @enderror"
                                    placeholder="Masukan Nama Lengkap" required value="{{ old('name') }}"/>
                                    @error ('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-outline input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"
                                        style="color: #508bfc;"></i></span>
                                <input type="text" name="username" id="typeEmailX-2" class="form-control form-control-lg @error ('username') is-invalid @enderror"
                                    placeholder="Masukkan Username" required value="{{ old('username') }}"/>
                                    @error ('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-outline input-group mb-4">
                                <!-- <label for="floatingInput" >Username</label><br><br> -->
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"
                                        style="color: #508bfc;"></i></span>
                                        <span class="input-group-text">+628</span>
                                <input type="number" name="no_telpon" id="typeEmailX-2" class="form-control form-control-lg @error ('no_telpon') is-invalid @enderror"
                                    placeholder="Masukan no telpon anda" required value="{{ old('no_telpon') }}"/>
                                    @error ('no_telpon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>

                            <div class="form-outline input-group mb-4">
                                <!-- <label for="floatingInput" >Username</label><br><br> -->
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"
                                        style="color: #508bfc;"></i></span>
                                <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg @error ('email') is-invalid @enderror"
                                    placeholder="Masukan E-mail anda" required value="{{ old('email') }}"/>
                                    @error ('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
    
                            <div class="form-outline input-group mb-4">
                                <!-- <label for="pwd" class="form-label">Password</label> -->
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-shield-alt text-primary"
                                        style="color: #508bfc;"></i></span>
                                <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg @error ('password') is-invalid @enderror"
                                    placeholder="Masukan Password anda" required />
                                    @error ('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-outline input-group mb-4">
                                <select class="form-select @error ('status') is-invalid @enderror"" aria-label="Default select example" name="status" required>
                                    <option selected>Register Sebagai</option>
                                    <option value="user">Pembeli</option>
                                    <option value="admin">Pedagang</option>
                                </select>
                                @error ('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
    
                            <!-- Checkbox -->
                            <!-- <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3">&nbsp;&nbsp;Remember password </label>
                            </div> -->
    
                            <!-- <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button> -->
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <button class="shadow btn btn-primary" type="submit">Register</button>
                            </div>
                            <hr class="my-4">
                            <small>
                                Sudah Punya Akun?
                                <a href="/login">Login Now!</a>
                            </small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<br><br><br><br>
@endsection
