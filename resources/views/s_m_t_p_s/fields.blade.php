
<!-- Host Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('host_name', 'Host Name:') !!}
    {!! Form::text('host_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Smtp Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('smtp_username', 'Smtp Username:') !!}
    {!! Form::text('smtp_username', null, ['class' => 'form-control']) !!}
</div>

<!-- Smtp Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('smtp_password', 'Smtp Password:') !!}
    {!! Form::text('smtp_password', null, ['class' => 'form-control']) !!}
</div>

<!-- Smtp Port Field -->
<div class="form-group col-sm-6">
    {!! Form::label('smtp_port', 'Smtp Port:') !!}
    {!! Form::number('smtp_port', null, ['class' => 'form-control']) !!}
</div>

<!-- Encryption Method Field -->
<div class="form-group col-sm-6">
    {!! Form::label('encryption_method', 'Encryption Method:') !!}
    {!! Form::text('encryption_method', null, ['class' => 'form-control']) !!}
</div>

<!-- Defaut From Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('defaut_from_email', 'Defaut From Email:') !!}
    {!! Form::text('defaut_from_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Defaut Messae Limit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('message_limit', 'Messae Limit:') !!}
    {!! Form::text('message_limit', null, ['class' => 'form-control']) !!}
</div>

<!-- Defaut Messae Limit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('smtprotation', 'SMTP Rotation:') !!}
    {!! Form::text('smtprotation', null, ['class' => 'form-control']) !!}
</div>

<!-- Defaut Model Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_name', 'Model Name:') !!}
    {!! Form::text('model_name', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
{!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('sMTPS.index') }}" class="btn btn-default">Cancel</a>
</div>
