@extends('layouts.admin')

@section('content')
	<ol class="breadcrumb">
	<li class="breadcrumb-item">
	<a href="{{route('home')}}">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Posts</li>
</ol>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Posts Data Table</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Author</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Body</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Author</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Body</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@if($posts)
                  		@foreach($posts as $post)
	                    <tr>
	                      <td>{{ $post->id }}</td>
                        <!-- <td><img src="{{ asset($post->photo ? $post->photo->file : '/defImg/man3.jpg') }}" height="70" width="100"></td>
	                      <td><a href="{{ route('users.edit', $post->id) }}">{{ $post->name }}</a></td> -->
                        <td><img src="{{ asset($post->photo ? $post->photo->file : 'https://via.placeholder.com/140x100') }}" height="70" width="100"></td>
                        <td>{{ $post->user->name }}</td>
	                      <td>{{ $post->category ? $post->category->name : 'uncategorize'}}</td>
	                      <td>{{ $post->title }}</td>
	                      <td>{{ $post->body }}</td>
	                      <td>{{ $post->created_at->diffForHumans() }}</td>
	                      <td>{{ $post->updated_at->toFormattedDateString() }}</td>
	                    </tr>
	                    @endforeach
	                @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

@stop