<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    	<li class="nav-item">
    		<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    	</li>
      	<li class="nav-item d-none d-sm-inline-block">
        	<a href="/dashboard" class="nav-link">Dashboard</a>
    	</li>
      	<li class="nav-item d-none d-sm-inline-block">
        	<a href="/dashboard/users/{{ auth()->user()->username }}" class="nav-link">My Profile</a>
      	</li>
      	<li class="nav-item d-none d-sm-inline-block">
        	<a href="/dashboard/posts" class="nav-link">My Posts</a>
      	</li>
		@can('admin')
      		<li class="nav-item d-none d-sm-inline-block">
        		<a href="/dashboard/admins" class="nav-link">Users Info</a>
      		</li>
      		<li class="nav-item d-none d-sm-inline-block">
        		<a href="/dashboard/categories" class="nav-link">Post Categories</a>
      		</li>
		@endcan
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      	<!-- Navbar Search -->
      	{{-- <li class="nav-item">
        	<a class="nav-link" data-widget="navbar-search" href="#" role="button">
          	<i class="fas fa-search"></i>
        	</a>
        	<div class="navbar-search-block">
          		<form class="form-inline">
            		<div class="input-group input-group-sm">
              			<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              			<div class="input-group-append">
                			<button class="btn btn-navbar" type="submit">
                  				<i class="fas fa-search"></i>
                			</button>
                			<button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  				<i class="fas fa-times"></i>
                			</button>
              			</div>
            		</div>
          		</form>
        	</div>
      	</li> --}}
	  	<li class="nav-item">
        	<a class="nav-link" data-widget="fullscreen" href="#" role="button">
          		<i class="fas fa-expand-arrows-alt"></i>
        	</a>
      	</li>
      	{{-- <li class="nav-item">
        	<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          		<i class="fas fa-th-large"></i>
        	</a>
      	</li> --}}
		  <li class="nav-item">
			<button type="button" class="nav-link bg-light border-0" onclick="toggleDarkMode()">
				<i class="fas fa-adjust"></i>
			</button>
		</li>
      	<li class="nav-item">
			<form action="/logout" method="post">
				@csrf
				<button type="submit" class="nav-link px-3 bg-light border-0">
					<i class="fas fa-sign-out-alt"></i>
				</button>
			  </form>		  		
      	</li>
   	</ul>
</nav>
  <!-- /.navbar -->