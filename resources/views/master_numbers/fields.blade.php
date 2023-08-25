
<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    <select class="from-control" name="country" >
        <option value="0">Select</option>
        @foreach($country as $key => $data)
        <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
        @endforeach
    </select>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Number:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>

<!-- Messagerotation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('messageRotation', 'Message Rotation:') !!}
    {!! Form::text('messageRotation', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('masterNumbers.index') }}" class="btn btn-default">Cancel</a>
</div>
