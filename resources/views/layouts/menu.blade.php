@if(auth()->user()->id == 1)
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>User</span></a>
</li>

@endif


<li class="{{ Request::is('messages*') ? 'active' : '' }}">
    <a href="{{ route('messages.index') }}"><i class="fa fa-edit"></i><span>Messages</span></a>
</li>

<li class="{{ Request::is('messageInfos*') ? 'active' : '' }}">
    <a href="{{ route('messageInfos.index') }}"><i class="fa fa-edit"></i><span>Lead Emails</span></a>
</li>
@if(auth()->user()->id == 1)
<li class="{{ Request::is('perMinSends*') ? 'active' : '' }}">
    <a href="{{ route('perMinSends.index') }}"><i class="fa fa-edit"></i><span>Per Minute Sends</span></a>
</li>

<li class="{{ Request::is('topups*') ? 'active' : '' }}">
    <a href="{{ route('topups.index') }}"><i class="fa fa-edit"></i><span>Topups</span></a>
</li>
@endif
@php
$allow = \App\Models\Setting::where('for_user_id',auth()->user()->id)->where('value',1)->get()->toArray();
@endphp

@if(!empty($allow) || auth()->user()->id == 1)
<li class="{{ Request::is('sMTPS*') ? 'active' : '' }}">
    <a href="{{ route('sMTPS.index') }}"><i class="fa fa-edit"></i><span>SMTPS</span></a>
</li>
@endif
@if(auth()->user()->id == 1)
<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{{ route('settings.index') }}"><i class="fa fa-edit"></i><span>Settings</span></a>
</li>
@endif
<li>
    <a href="{{ Route('resetServer') }}"><button class="btn btn-warning">Reset Server</span></a>
</li>
<li>
    <a href="{{ Route('resetServer.master', ['master']) }}"><button class="btn btn-danger">Master Reset Server</span></a>
</li>

