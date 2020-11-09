<div class="navbar navbar-light navbar-expand py-0 navbar-top position-absolute w-100 navbar-home" style="top: 0px; z-index: 2;">
    <div class="container-fluid py-3">
        <div class="col-lg-8 col-md-6">
            <div class="d-flex">
                <div class="p-2 bg-white rounded d-none d-sm-block">
                    <img src="{{ asset('img/logo-GMIT.png') }}" alt="" style="max-height: 50px;">
                </div>
                <div class="p-2 d-flex flex-column justify-content-center mr-auto">
                    <div class="pl-md-4 text-primary">
                        <div class="h4 text-white title font-weight-bolder">
                            Selamat Datang di Halaman Data Base Jemaat GMIT Diaspora Danau Ina Oesapa
                        </div>
                        <div class="text-light small d-flex description">
                            <div class="pr-3">
                                <div class="h-100 d-flex justify-content-center flex-column">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                Alamat Jln. Suratim, KM. 10, Oesapa, Kupang, NTT
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-nav py-0 ml-auto d-flex d-md-none">
            <div class="navbar-text px-2 small d-none d-lg-block">
                {{ now()->format('D, d-M-Y') }}
            </div>
            @auth
                <a href="{{ route('admin') }}" class="btn-outline-light btn btn-sm px-3 ml-2">
                    <div class="d-flex flex-column justify-content-center h-100">
                        Panel Admin
                    </div>
                </a>
            @else   
                <a href="{{ route('login') }}" class="btn-outline-light btn btn-sm px-3 ml-2">
                    <div class="d-flex flex-column justify-content-center h-100">
                        Login
                    </div>
                </a>
            @endauth
        </div>
    </div>
</div>