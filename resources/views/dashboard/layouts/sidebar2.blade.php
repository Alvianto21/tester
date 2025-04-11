<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky">
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Blog Post</span>
    </h6>        
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <i class="bi bi-speedometer"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
          <i class="bi bi-file-earmark-font-fill"></i>
          My Post
        </a>
      </li>
    </ul>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>User Info</span>
    </h6>
    <ul class="nav flex-column"> 
      <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users/{{ auth()->user()->username }}">
          <i class="bi bi-person-circle"></i>
          User Profile
        </a> 
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="/dashboard/users/{{ auth()->user()->username }}/edit">
          <i class="bi bi-person-lines-fill"></i>
          Edit Profile
        </a>
      </li>
      <li class="nav-item">
        <form action="/dashboard/users/{{ auth()->user()->username }}"
          method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="nav-link text-dark border-0 bg-light" onclick="return confirm('Are you sure?')">
            <i class="bi bi-person-bounding-box"></i>
            Delete Account
          </button>
        <a class="nav-link text-dark gap-1" href="/dashboard/users/{{ auth()->user()->username }}" >
        </a>
      </form>
      </li>
    </ul>

    @can('admin')
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Administrator</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('dashboard/admins*') ? 'active' : '' }}" href="/dashboard/admins">
          <i class="bi bi-journal"></i>                  
          All Users
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <i class="bi bi-grid"></i>                  
          Post Categories
        </a>
      </li>
    </ul>
    @endcan
  </div>
</nav>