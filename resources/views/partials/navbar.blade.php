<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">GORNAL Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is("/") ? 'active' : '' }}"  href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is("about") ? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is("posts") ? 'active' : '' }}" href="/posts">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is("categories") ? 'active' : ''}}" href="/categories">categories</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome Home, {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left" aria-hidden="true"></i>Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @else 
          <li class="nav-item">
            <a href="/login" class="nav-link"{{ ($active === "login") ? 'active' : '' }}><i class="bi bi-box-arrow-in-right"></i>Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>