<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Lotto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @if(Illuminate\Support\Facades\Auth::check())
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('loto.index') ? 'active' : '' }}" href="{{ route('loto.index') }}">Play Now!</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->routeIs('profile.index') ? 'active' : '' }}" href="{{ route('profile.index') }}">My account</a>
                </li>
            @else
                <li class="nav-item">
                  <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="/login">Log In</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="/register">Create an account</a>
                </li>
            @endif
        </ul>
      </div>
    </div>
  </nav>
