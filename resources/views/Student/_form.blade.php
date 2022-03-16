<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name']) }}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<div class="btn-group pull-right">
    {{-- {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!} --}}
    {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
</div>
