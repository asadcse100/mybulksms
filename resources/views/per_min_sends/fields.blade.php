
<!-- Perminsend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perminsend', 'Perminsend:') !!}
    {!! Form::number('perminsend', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
{!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('perMinSends.index') }}" class="btn btn-default">Cancel</a>
</div>
