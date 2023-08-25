<!-- To Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Imports SMTP:') !!}
    {!! Form::file('importsmtpserver') !!}
</div>
<div class="clearfix"></div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Upload List', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('sMTPS.index') }}" class="btn btn-default">Cancel</a>
</div>
