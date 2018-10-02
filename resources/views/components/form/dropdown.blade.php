<div class="form-group">
    <b>{{ Form::label($name, $opt) }}</b>
    {{ Form::select($name, [''=>'Choose one']+$data,$default, ['class' => 'custom-select my-1 mr-sm-2', 'required' => true]) }}
</div>



