<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $sMTP->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $sMTP->user_id }}</p>
</div>

<!-- Host Name Field -->
<div class="form-group">
    {!! Form::label('host_name', 'Host Name:') !!}
    <p>{{ $sMTP->host_name }}</p>
</div>

<!-- Smtp Username Field -->
<div class="form-group">
    {!! Form::label('smtp_username', 'Smtp Username:') !!}
    <p>{{ $sMTP->smtp_username }}</p>
</div>

<!-- Smtp Password Field -->
<div class="form-group">
    {!! Form::label('smtp_password', 'Smtp Password:') !!}
    <p>{{ $sMTP->smtp_password }}</p>
</div>

<!-- Smtp Port Field -->
<div class="form-group">
    {!! Form::label('smtp_port', 'Smtp Port:') !!}
    <p>{{ $sMTP->smtp_port }}</p>
</div>

<!-- Encryption Method Field -->
<div class="form-group">
    {!! Form::label('encryption_method', 'Encryption Method:') !!}
    <p>{{ $sMTP->encryption_method }}</p>
</div>

<!-- Defaut From Email Field -->
<div class="form-group">
    {!! Form::label('defaut_from_email', 'Defaut From Email:') !!}
    <p>{{ $sMTP->defaut_from_email }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $sMTP->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $sMTP->updated_at }}</p>
</div>

