<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $topup->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $topup->user_id }}</p>
</div>

<!-- Exptime Field -->
<div class="form-group">
    {!! Form::label('exptime', 'Exptime:') !!}
    <p>{{ $topup->exptime }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $topup->price }}</p>
</div>

<!-- Smslimit Field -->
<div class="form-group">
    {!! Form::label('smslimit', 'Send limit:') !!}
    <p>{{ $topup->smslimit }}</p>
</div>

<!-- Smslimit Field -->
<div class="form-group">
    {!! Form::label('per_day_limit', 'Per day limit:') !!}
    <p>{{ $topup->per_day_limit }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $topup->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $topup->updated_at }}</p>
</div>

