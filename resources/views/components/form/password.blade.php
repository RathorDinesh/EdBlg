<div class="form-group">
    <b>{{ Form::label($name) }}</b>
    {{ Form::password($name, array_merge(['class' => 'form-control'], $attributes)) }}
</div>



