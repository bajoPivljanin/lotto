<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Lotto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route("loto.index")}}">Loto</a>
          </li>
          <li class="nav-item">
            @if(Illuminate\Support\Facades\Auth::check())
              <a class="nav-link" href="/profile">My account</a>
            @else
              <a class="nav-link" href="/login">My account</a>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
