<div class="sidebar">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
    	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        	<div class="image">
				@if (Auth::user()->photo)
            		<img src="{{ asset('storage/' . Auth::user()->photo) }}" class="brand-image img-circle elevation-3" style="opacity: .8" alt="{{ Auth::user()->name }}">
        		@else
					<img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=7F9CF5&background=EBF4FF" alt="{{ Auth::user()->name }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        		@endif
        	</div>
        	<div class="info">
          		<a href="#" class="d-block">{{ Auth::user()->name }}</a>
        	</div>
      	</div>

      	<!-- Sidebar Menu -->
      	<nav class="mt-2">
        	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          		<li class="nav-item">
            		<a href="/dashboard" class="nav-link">
              			<i class="nav-icon fas fa-tachometer-alt"></i>
              			<p>
                			Dashboard
              			</p>
            		</a>
				</li>
				<li class="nav-item">
           			<a href="#" class="nav-link">
              			<i class="nav-icon fas fa-copy"></i>
              				<p>
                				My Post
                				<i class="fas fa-angle-left right"></i>
              			</p>
            		</a>
            		<ul class="nav nav-treeview">
              			<li class="nav-item">
                			<a href="/dashboard/posts/create" class="nav-link">
								<i class="fa fa-plus-circle" aria-hidden="true"></i>
								<p>New Post </p>
                			</a>
              			</li>
              			<li class="nav-item">
                			<a href="/dashboard/posts" class="nav-link">
								<i class="fas fa-table" aria-hidden="true"></i>
                  				<p>All Post</p>
                			</a>
              			</li>
            		</ul>
          		</li>
		  		<li class="nav-item">
            		<a href="#" class="nav-link">
              			<i class="nav-icon fa fa-user-circle-o"></i>
              			<p>
               				User Profile
                			<i class="fas fa-angle-left right"></i>
              			</p>
            		</a>
            		<ul class="nav nav-treeview">
              			<li class="nav-item">
                			<a href="/dashboard/users/{{ auth()->user()->username }}" class="nav-link">
                  				<i class="fa fa-user-md" aria-hidden="true"></i>
                  				<p>My Profile</p>
                			</a>
              			</li>
              			<li class="nav-item">
                			<a href="/dashboard/users/{{ auth()->user()->username }}/edit" class="nav-link">
                  				<i class="fa fa-user-o" aria-hidden="true"></i>
                  				<p>Edit Profile</p>
                			</a>
              			</li>
            		</ul>
          		</li>
				@can('admin')
					<li class="nav-item">
						<a href="#" class="nav-link">
					  		<i class="nav-icon fas fa-table"></i>
					  		<p>
								Administrator
								<i class="fas fa-angle-left right"></i>
					  		</p>
						</a>
						<ul class="nav nav-treeview">
					  		<li class="nav-item">
								<a href="/dashboard/admins" class="nav-link">
						  			<i class="fa fa-phone-square" aria-hidden="true"></i>
						  			<p>All Users</p>
								</a>
					  		</li>
					  		<li class="nav-item">
								<a href="/dashboard/categories" class="nav-link">
						  			<i class="fa fa-puzzle-piece" aria-hidden="true"></i>
						  			<p>Post Categories</p>
								</a>
					  		</li>
						</ul>
					</li>
				@endcan
        	</ul>
      	</nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
</div>