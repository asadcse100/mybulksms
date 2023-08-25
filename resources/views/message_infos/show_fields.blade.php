<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $messageInfo->id }}</p>
</div>

<!-- To Number Field -->
<div class="form-group">
    {!! Form::label('to_number', 'To Number:') !!}
    <p>{{ $messageInfo->to_number }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $messageInfo->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $messageInfo->created_at }}</p>
</div>

