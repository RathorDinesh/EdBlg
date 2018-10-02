@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
	<li class="breadcrumb-item">
	<a href="{{route('users.index')}}">Users</a>
	</li>
	<li class="breadcrumb-item active">Edit Users</li>
</ol>

<div>
	@include('inc.Ferrors')
</div>
<div class="container">
<div class="row">
<div class="col-sm-3 col-md-3 text-center">

	<img src="{{ asset($user->photo ? $user->photo->file : '/defImg/man3.jpg') }}" class="img-fluid rounded"><br><br>
		
</div>

	<div class="col-sm-9 col-md-9">

		{!! Form::model($user, ['action' => ['AdminUsersController@update', $user->id], 'method' => 'POST', 'files' => true]) !!}

			{{ Form::bsText('name', 'Name', ['class' => 'form-control']) }}
			{{ Form::bsEmail('email',null) }}
			{{ Form::bsPassword('password') }}
			{{ Form::bsFile('photo', ['class' => 'mx-2']) }}
			{{ Form::bsDrop('is_active', 'Status', null, [1 => 'Active', 0 => 'Not Active']) }}
			{{ Form::bsDrop('role_id', 'Role', null, $roles) }}
			{{ Form::hidden('_method', 'PATCH') }}
			{{ Form::bsSubmit('Create User', ['class' => 'btn btn-primary float-left']) }}

		{!! Form::close() !!}

		{!!Form::open(['action' => ['AdminUsersController@destroy', $user->id], 'method'=>'POST'])!!}
			{{Form::hidden('_method', 'DELETE')}}
			{{Form::submit('Delete User', ['class'=> 'btn btn-danger float-right'])}}
		{!!Form::close()!!}
	 <br><br>
	</div>
	
</div>
</div>
@endsection