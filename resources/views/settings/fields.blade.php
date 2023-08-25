
<!-- Bwbaseurl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('own_smtp', 'Own SMTP Allow (Email):') !!}
    <select class="from-control" name="for_user_id" >
        <option>Select</option>
        @foreach(\App\Models\User::all() as $key => $user)
        <option value="{{ $user->id }}">{{ $user->email }}</option>
        @endforeach
    </select>
</div>

<!-- Bwusername Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Status', 'Status:') !!}
    <select class="from-control" name="value" >
        <option>Select</option>
        <option value="1">Allow</option>
        <option value="0">Not Allow</option>
    </select>
</div>

<div class="form-group col-sm-6">
{!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('settings.index') }}" class="btn btn-default">Cancel</a>
</div>
