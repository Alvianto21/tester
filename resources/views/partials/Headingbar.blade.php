<nav class="navbar fixed-top sticky-top bg-dark flex-md-nowrap p-0 shadow"  data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">GORNAL Blog</a>
  
    <ul class="navbar-nav flex-row d-md-none">
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
          <svg class="bi"><use xlink:href="#search"/></svg>
        </button>
      </li>
      <li class="nav-item text-nowrap">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="bi"><use xlink:href="#list"/></svg>
        </button>
      </li>
    </ul>
  
    <form class="form-inline my-2 my-lg-0 d-flex mt-3 p-0">
        @csrf
        <input class="form-control mr-sm-2 bg-dark" type="search" placeholder="Search" aria-label="Search">
    </form>
</nav>