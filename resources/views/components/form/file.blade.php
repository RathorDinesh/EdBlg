<div class="form-group">
	<b>{{ Form::label($name, $opt) }}</b>
	{{ Form::file($name, null, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>