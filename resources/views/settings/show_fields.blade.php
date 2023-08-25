<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $setting->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $setting->user_id }}</p>
</div>

<!-- Bwbaseurl Field -->
<div class="form-group">
    {!! Form::label('bwBaseUrl', 'Bandwidth Baseurl:') !!}
    <p>{{ $setting->bwBaseUrl }}</p>
</div>

<!-- Bwusername Field -->
<div class="form-group">
    {!! Form::label('bwUserName', 'Bandwidth Username:') !!}
    <p>{{ $setting->bwUserName }}</p>
</div>

<!-- Bwpassword Field -->
<div class="form-group">
    {!! Form::label('bwPassword', 'Bandwidth Password:') !!}
    <p>{{ $setting->bwPassword }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $setting->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $setting->updated_at }}</p>
</div>

