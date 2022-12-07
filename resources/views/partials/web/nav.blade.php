<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top" aria-label="Third navbar example">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Laravel5 Base App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03">
      <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">
          @guest
            Inside Us
          @else
            {{ Auth::user()->name }}
          @endguest  
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdown03">
          @guest
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
          @else
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
            </li>
          @endguest  
          </ul>
        </li>


      </ul>
    </div>
  </div>
</nav>