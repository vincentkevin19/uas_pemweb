<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">NewsPortalUmn</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        @auth
          @if (auth()->user()->role == 'user')
          <a class="nav-link" href="/facility">Facilities</a>
            <a class="nav-link" href="/booking">request</a>
          @endif
          @if (auth()->user()->role == 'admin')
          <a class="nav-link" href="/users">Users</a>
          <a class="nav-link" href="/facility">Facilities</a>
            <a class="nav-link" href="/booking">request</a>
          @endif
          @if (auth()->user()->role == 'management')
          <a class="nav-link" href="/facility">Facilities</a>
            <a class="nav-link" href="/booking">request</a>
          @endif
        @endauth
      </div>
      <ul class="navbar-nav ms-sm-auto">
        @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <form action="/logout" method="POST" >
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>  Log Out</button>
                  </form>
                </li>
              </ul>
            </li>
          @else
              <li class="nav-item">
                <a href="/login" class="nav-link" class="btn-grad"> Login</a>
              </li>
          @endauth
      </ul>
    </div>
  </div>
</nav>