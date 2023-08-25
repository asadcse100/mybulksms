<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterNumber->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $masterNumber->user_id }}</p>
</div>

<!-- Message Id Field -->
<div class="form-group">
    {!! Form::label('message_id', 'Message Id:') !!}
    <p>{{ $masterNumber->message_id }}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $masterNumber->country }}</p>
</div>

<!-- Number Field -->
<div class="form-group">
    {!! Form::label('number', 'Number:') !!}
    <p>{{ $masterNumber->number }}</p>
</div>

<!-- Messagelimit Field -->
<div class="form-group">
    {!! Form::label('messageLimit', 'Messagelimit:') !!}
    <p>{{ $masterNumber->messageLimit }}</p>
</div>

<!-- Messagerotation Field -->
<div class="form-group">
    {!! Form::label('messageRotation', 'Messagerotation:') !!}
    <p>{{ $masterNumber->messageRotation }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterNumber->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterNumber->updated_at }}</p>
</div>

