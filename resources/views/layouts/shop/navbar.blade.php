<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{ route('home') }}"
                class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase">{{ config('app.name') }}</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-1 p-lg-0">
                <a href="{{ route('home') }}" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase">ALMERCH</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-1000">
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link{{ Request::is('/') ? ' active' : '' }}">Beranda</a>
                        <a href="{{ route('shop.keranjang') }}"
                            class="nav-item nav-link{{ Request::is('keranjang') ? ' active' : '' }}">Keranjang</a>
                        <a href="{{ route('shop.pemesanan') }}"
                            class="nav-item nav-link{{ Request::is('pemesanan') ? ' active' : '' }}">Pemesanan</a>
                            <a href="{{ route('login') }}"
                            class="nav-item nav-link{{ Request::is('login') ? ' active' : '' }}">Login</a>"
                          

                        @auth
                        <div class="nav-item nav-link">
                            {{ auth()->user()->nama_pengguna }}
                        </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>