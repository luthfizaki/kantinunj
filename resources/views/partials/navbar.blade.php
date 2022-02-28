
   
   <nav class="navbar fixed-top navbar-expand-lg navbar-light  navbar-custom sticky-top bgcolor ">
        <div class="container">
            <a class="navbar-brand" href="#">E-KANTIN UNJ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarsExampleDefault">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ">
                        <a class="nav-link page-scroll" href="/">HOME<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link page-scroll"
                            href="/kantin">KANTIN</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link page-scroll "
                            href="/about">TENTANG KAMI</a>
                    </li>
                    <li class="nav-item }">
                        <a class="nav-link page-scroll" href="/contact">KONTAK KAMI</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <span class="fa-stack">
                        <a href="/dashboard/product" class="nav-link">
                            <i class="fas fa-shopping-basket fa-stack-2x"></i>
                        </a>
                        @if ( auth() )
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-unj">
                            {{ $transactions->where('status', 'on cart')->count() }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                        @else
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-unj">
                            0
                            <span class="visually-hidden">unread messages</span>
                        </span>
                        @endif
                        
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class=" dropdown-item" href="/dashboard/user">My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                                
                            </li>
                        </ul>
                    </li>

                @else
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="/login">Login</a>
                </li>
                @endauth
                </ul>

    

            </div>
        </div>
        </div>
    </nav>
