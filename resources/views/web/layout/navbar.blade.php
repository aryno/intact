<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item me-4">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('list') }}">Features</a>
        </li>
      </ul>
    </div>

    <div>
      <ul class="navbar-nav">
        @if(auth()->check())
        <li class="nav-item me-4">
            <a class="nav-link active" aria-current="page" href="{{ route('users.dashboard')  }}">
              Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('auth.logout')  }}">Logout</a>
          </li>
        @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('login')  }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Signup</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>