<!-- User Id Field -->

<!-- Messagerotation Field -->
<div class="form-group col-sm-5">
    {!! Form::label('messagerotation', 'Message Rotation:') !!}
    {!! Form::text('messagerotation', null, ['class' => 'form-control']) !!}
</div><br>

<!-- Header Field -->
<div class="form-group col-sm-8">
    {!! Form::label('messageheader', 'Message Header:') !!}
    {!! Form::text('messageheader', null, ['class' => 'form-control']) !!}
</div>

<!-- Messagebody Field -->
<div class="form-group col-sm-10">
    {!! Form::label('messagebody', 'Message Body:') !!}
    {!! Form::textarea('messagebody', null, ['class' => 'form-control']) !!}
</div>

<!-- Attachment Field -->
<div class="form-group col-sm-10">
    <div class="form-group">
        <label for="attachment">Attachment</label>
        <input type="file" multiple name="attachment[]" class="form-control" id="attachment">
    </div>
</div>
                       

<div class="form-group col-sm-6">
{!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('messages.index') }}" class="btn btn-default">Cancel</a>
</div>