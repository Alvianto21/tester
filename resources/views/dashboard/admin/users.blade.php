@extends('dashboard.layouts.main')
@section('container')

	<div class="d-flex justify flex-wrap flex-md-nowrap align-items-center py-2 mb-3 border-bottom">
		<h1 class="h2">Users Data</h1>
	</div>
  
	@if (session()->has('success'))
		<div class="alert alert-warning alert-dismissible" role="alert">          
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
      <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>        
      {{ session('success') }}
		</div>
	@endif

  <div class="table-responsive col-lg-12">
	{{-- <a href="/dashboard/admins/create" class="btn btn-primary mb-3"><i class="bi bi-plus"></i>Create new user</a> --}}
	<table id="table1" class="table table-bordered table-hover" aria-describedby="table_info">
	  <thead>
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Name</th>
		  <th scope="col">Username</th>
		  <th scope="col">Email</th>
		  <th scope="col">Post</th>
		  <th scope="col">Gender</th>
		  <th scope="col">Phone Nomber</th>
		  <th scope="col">Action</th>
		</tr>
	  </thead>
	  <tbody>
		@foreach ($users as $user)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->username }}</td>
			<td>{{ $user->email }}</td>
			@if ($user->is_admin)
				<td>Admin</td>
			@else
				<td>User</td>
		  @endif
		  <td>{{ $user->gender }}</td>
		  <td>{{ $user->phone }}</td>
		  <td>
			{{-- <a href="" class="badge bg-info"><i class="bi bi-eye"></i></a> --}}
			<a href="/dashboard/admins/{{ $user->username }}/edit" class="badge bg-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
			{{-- <form action="" method="post" class="d-inline">
			  @method('delete')
			  @csrf
			  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i></button>
			</form> --}}
		  </td>
		</tr>      
		@endforeach
	  </tbody>
	</table>
  </div>
  
  @push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  @endpush
  
  @push('scripts')
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('/js/tableRes.js') }}"></script>
  
  <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  
  <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  
  <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  
  <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  @endpush

@endsection