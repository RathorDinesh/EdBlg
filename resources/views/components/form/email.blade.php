<div class="form-group">
    <b>{{ Form::label($name) }}</b>
    {{ Form::email($name, $value, array_merge(['class' => 'form-control', 'required' => true], $attributes)) }}
</div>