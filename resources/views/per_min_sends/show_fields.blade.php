<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $perMinSend->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $perMinSend->user_id }}</p>
</div>

<!-- Perminsend Field -->
<div class="form-group">
    {!! Form::label('perminsend', 'Perminsend:') !!}
    <p>{{ $perMinSend->perminsend }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $perMinSend->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $perMinSend->updated_at }}</p>
</div>

