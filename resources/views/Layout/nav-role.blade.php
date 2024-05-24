
<nav class="navbar navbar-expand-lg navbar-light bg-white">
            <!-- <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo-sagita.webp') }}" alt="LOGO">
            </a> -->
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class='bx bx-menu'></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <!-- <form class="form-inline d-flex flex-grow-1">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form> -->

                @auth
                <!-- <li class="nav-item dropdown"> -->
                <!-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> -->
                <a class="nav-link" href="#" role="button" aria-expanded="false"></a>
                    <i class="bi bi-person-lines-fill"></i>{{ auth()->user()->username }}
                </a>
                <!-- <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">My Dashboard</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul> -->
                <!-- </li> -->
                <!-- @else
                <a class="nav-link" href="{{ route('login')}}">MASUK</a> -->
                @endauth
                
            </div>
            </div>
        </div>
    </nav>