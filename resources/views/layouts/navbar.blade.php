<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">LaravelApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/profil">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tampil-produk">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/transaksi">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/laporan">Laporan</a>
        </li>
      </ul>

      @auth
      <div class="dropdown ms-auto">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
          data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="">Profile</a></li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="dropdown-item">Logout</button>
            </form>
          </li>
        </ul>
      </div>
      @else
      <a href="{{ route('login') }}" class="nav-link ms-auto">Login</a> |
      <a href="{{ route('register') }}" class="nav-link">Register</a>
      @endauth
    </div>
  </div>
</nav>
