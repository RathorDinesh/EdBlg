@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
	<li class="breadcrumb-item">
	<a href="{{route('home')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Users</li>
</ol>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Active</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@if($users)
                  		@foreach($users as $user)
	                    <tr>
	                      <td>{{ $user->id }}</td>
                        <td><img src="{{ asset($user->photo ? $user->photo->file : '/defImg/man3.jpg') }}" height="70" width="100"></td>
	                      <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
	                      <td>{{ $user->email }}</td>
	                      <td>{{ $user->role->name }}</td>
	                      <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
	                      <td>{{ $user->created_at->diffForHumans() }}</td>
	                      <td>{{ $user->updated_at->toFormattedDateString() }}</td>
	                    </tr>
	                    @endforeach
	                @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>


@endsection