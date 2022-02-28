@extends ('layouts.main')

@section ('container')
<section class="vh-100" style="background-color: white;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-10 col-lg-8 col-xl-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <h3 class="mb-5 text-center text-dark">Selamat Datang di E-Kantin UNJ</h3>
                <!-- <h3 class="mb-5 text-center text-light">E-Kantin UNJ</h3> -->
                <form action="/login" method="post">
                @csrf
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">

                            <h3 class="mb-5 text-center">LOGIN</h3>

                            <div class="form-outline input-group mb-4">
                                <!-- <label for="email" class="form-label">Username</label><br><br> -->
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"
                                        style="color: #508bfc;"></i></span>
                                <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg @error ('email') is-invalid @enderror"
                                    placeholder="Masukan E-mail anda" required value="{{ old('email') }}"/>
                                    @error ('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                <!-- <label class="form-label" for="typeEmailX-2">Email</label> -->
                                <div id="emailHelp" class="form-text d-none d-lg-block">Gunakan email unj anda untuk
                                    login
                                    ke E-kantinUnj</div>
                            </div>

                            <div class="form-outline input-group mb-4">
                                <!-- <label for="pwd" class="form-label">Password</label> -->
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-shield-alt text-primary" style="color: #508bfc;"></i></span>
                                <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg"
                                    placeholder="Masukan Password anda" required/>
                                    @error ('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                <!-- <label class="form-label" for="typePasswordX-2">Password</label> -->
                            </div>

                            <!-- Checkbox -->
                            <!-- <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3">&nbsp;&nbsp;Remember password </label>
                            </div> -->

                            <!-- <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button> -->
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <button class="shadow btn btn-primary" type="submit">Login</button>
                            </div>
                            <hr class="my-4">
                            <small>
                                Belum Punya Akun?
                                <a href="/register">Register Now!</a>
                            </small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
