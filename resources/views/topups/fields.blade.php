<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id (Email):') !!}
    <select class="from-control" name="customer_id" >
        <option value="0">Select</option>
        @foreach($user as $key => $data)
        <option value="{{ $data['id'] }}">{{ $data['email'] }}</option>
        @endforeach
    </select>
</div>

<!-- Exptime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exptime', 'Exptime:') !!}
    {!! Form::date('exptime', null, ['class' => 'form-control','id'=>'exptime']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#exptime').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price(Taka):') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Smslimit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('smslimit', 'Send Limit:') !!}
    {!! Form::number('smslimit', null, ['class' => 'form-control']) !!}
</div>

<!-- Smslimit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('per_day_limit', 'Per day limit:') !!}
    {!! Form::number('per_day_limit', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('topups.index') }}" class="btn btn-default">Cancel</a>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
{!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>