<!-- User Id Field -->

<!-- name Field -->
<div class="form-group col-sm-7">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div><br>

<!-- email Field -->
<div class="form-group col-sm-7">
    {!! Form::label('email', 'User Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- email Field -->
<div class="form-group col-sm-7">
    {!! Form::label('user_phone', 'User Phone:') !!}
    {!! Form::text('user_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- password Field -->
<div class="form-group col-sm-7">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-7">
{!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-7">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>