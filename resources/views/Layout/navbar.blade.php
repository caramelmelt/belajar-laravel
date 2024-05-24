
    <nav class="navbar navbar-expand-lg navbar-light bg-white pt-2">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/inventory.png') }}" alt="LOGO">
                <span class="mx-3">InventarisPlus</span>
            </a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class='bx bx-menu'></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                @auth
                <a class="nav-link" href="#" role="button" aria-expanded="false">
                    Welcome back, {{ auth()->user()->name }} | {{ auth()->user()->role->level }}
                </a>
                @else
                    @if(Route::currentRouteName() == 'login' || Route::currentRouteName() == 'register')
                    <a class="btn text-white" style="background-color:var(--primary-light)" href="{{ route('home')}}">BACK</a>
                    @else
                    <a class="nav-link" href="#layanan">Layanan</a>
                    <a class="nav-link" href="#tentang-kami">Tentang kami</a>
                    <a class="nav-link" href="#hubungi-kami">Hubungi</a>
                    <a class="btn text-white" style="background-color:var(--primary-light)" href="{{ route('login')}}">MASUK</a>
                    @endif
                @endauth
                
            </div>
            </div>
        </div>
    </nav>