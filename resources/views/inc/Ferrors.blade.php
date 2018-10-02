@if(count($errors) > 0)
	<!-- <div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div> -->

<ul class="pl-1">
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show float-none" role="alert">

	  <strong>OPPS!</strong> {{ $error }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>

</div>
 @endforeach
 </ul>

@endif