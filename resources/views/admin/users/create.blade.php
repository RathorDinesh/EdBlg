@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
	<li class="breadcrumb-item">
	<a href="{{route('users.index')}}">Users</a>
	</li>
	<li class="breadcrumb-item active">Create Users</li>
</ol>

<div>
	@include('inc.Ferrors')
</div>

{!! Form::open(['action' => 'AdminUsersController@store', 'method' => 'POST', 'files' => true]) !!}

	{{ Form::bsText('name', 'Name', ['class' => 'form-control']) }}
	{{ Form::bsEmail('email') }}
	{{ Form::bsPassword('password') }}
	{{ Form::bsFile('photo', ['class' => 'mx-2']) }}
	{{ Form::bsDrop('is_active', 'Status', null, [1 => 'Active', 0 => 'Not Active'], '') }}
	{{ Form::bsDrop('role_id', 'Role', null, $roles, '') }}
	{{ Form::bsSubmit('Create User', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}


@endsection