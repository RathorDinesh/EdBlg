<div class="form-group">
    <b>{{ Form::label($name, $opt) }}</b>
    {{ Form::text($name, null, $value, array_merge(['class' => 'form-control', 'required' => true], $attributes)) }}
</div>

<!-- see optional name is passed in label --> 
