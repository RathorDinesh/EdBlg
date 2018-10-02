<div class="form-group">
    <b>{{ Form::label($name, $opt) }}</b>
    {{ Form::textarea($name, null, $value, array_merge(['class' => 'form-control', 'required' => true], $attributes)) }}
</div>