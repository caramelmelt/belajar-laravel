
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <input type="checkbox" id="openSideMenu" class="openSideMenu">
            <label for="openSideMenu" class="menuIconToggle">
            <div class="hamb-line dia part-1"></div>
            <div class="hamb-line hor"></div>
            <div class="hamb-line dia part-2"></div>
            </label>
            <div class="sidebar">
            <ul>
                <li><a href="#">Menu Item 1</a></li>
                <li><a href="#">Menu Item 2</a></li>
                <li><a href="#">Menu Item 3</a></li>
                <li><a href="#">Menu Item 4</a></li>
            </ul>
            </div>
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo-sagita.webp') }}" alt="LOGO">
            </a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class='bx bx-menu'></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <form class="form-inline d-flex flex-grow-1">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                <a class="nav-link" href=""><i class='bx bxs-cart' ></i></a>
                <a class="nav-link" href=""><i class='bx bxs-heart' ></i></a>
                <a class="nav-link" href="{{ route('about') }}"><i class='bx bxs-user-circle' ></i></a>
            </div>
            </div>
        </div>
    </nav>