@extends('layouts.admin')

@section('content')
	<ol class="breadcrumb">
	<li class="breadcrumb-item">
	<a href="{{route('posts.index')}}">Posts</a>
	</li>
	<li class="breadcrumb-item active">Create Posts</li>
</ol>

<div>
	@include('inc.Ferrors')
</div>

{!! Form::open(['action' => 'AdminPostsController@store', 'method' => 'POST', 'files' => true]) !!}

	{{ Form::bsText('title', 'Title', ['class' => 'form-control']) }}
	{{ Form::bsDrop('category_id', 'Category', null, $category, '') }}
	{{ Form::bsFile('photo_id', 'Photo', ['class' => 'mx-2']) }}
	{{ Form::bsTextArea('body', 'Content', ['class' => 'form-control']) }}
	{{ Form::bsSubmit('Create User', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}

@stop