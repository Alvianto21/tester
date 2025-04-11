<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/">GORNAL BLOG</a>
      <button class="navbar-toggler position-absolute d-md-none collapse" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="nav-nav"></div>
        <div class="nav-item text-nowrap">
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link px-3 bg-light border-0">Logout<i class="bi bi-box-arrow-right"></i></button>
          </form>
        </div>
      </div>
    </header>