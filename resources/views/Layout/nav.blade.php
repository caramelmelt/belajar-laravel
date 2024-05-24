   @auth
   <nav role="navigation">
    <div id="menuToggle">
      <input type="checkbox" />
      <span></span>
      <span></span>
      <span></span>
      <ul id="menu">
        <a href="#">
        <li>
            <i class="bi bi-box"></i>
            Inventaris App
        </li></a>
        <a>
        <li>
            <small>Welcome, {{ auth()->user()?->name }}</small>
        </li>
        </a><hr>
        <a href="{{ route('admin')}}"><li><i class="bi bi-house-door"></i> Dashboard</li></a>
        <a href="{{ route('inventaris')}}"><li><i class="bi bi-boxes"></i> Data Inventaris</li></a>
        <a href="{{ route('permintaan')}}"><li><i class="bi bi-info-circle-fill"></i> Permintaan</li></a>
        <a href="{{ route('user')}}"><li><i class="bi bi-person-lines-fill"></i> Data User</li></a>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" style="all:unset;" onclick="confirm('Apakah anda yakin ingin logout?')">
                <a><li><i class="bi bi-box-arrow-right"></i> Logout</li></a>
            </button>
        </form>
      </ul>
    </div>
  </nav>
   @endauth