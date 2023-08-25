<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $message->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $message->user_id }}</p>
</div>

<!-- Number Id Field -->
<div class="form-group">
    {!! Form::label('number_id', 'Number Id:') !!}
    <p>{{ $message->number_id }}</p>
</div>

<!-- Messagesequence Field -->
<div class="form-group">
    {!! Form::label('messagesequence', 'Message Sequence:') !!}
    <p>{{ $message->messagesequence }}</p>
</div>

<!-- Messagerotation Field -->
<div class="form-group">
    {!! Form::label('messagerotation', 'Message Rotation:') !!}
    <p>{{ $message->messagerotation }}</p>
</div>

<!-- Messagebody Field -->
<div class="form-group">
    {!! Form::label('messagebody', 'Message Body:') !!}
    <p>{{ $message->messagebody }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $message->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $message->updated_at }}</p>
</div>

