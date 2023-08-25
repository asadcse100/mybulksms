<div class="table-responsive">
    <table class="table" id="settings-table">
        <thead>
            <tr>
                <th>User Id</th>
                <th>Own SMTP Allow</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($settings as $setting)
            <tr>
            <td>{{ $user[$setting->user_id - 1]['email'] }}</td>
            <td>{{ $user[$setting->for_user_id - 1]['email'] }}</td>
            @if($setting->value == 1)
            <td><p style="color:green;">Allow</p></td>
            @elseif($setting->value == 0)
            <td><p style="color:red;">Not Allow</p></td>
            @endif
                <td>
                    {!! Form::open(['route' => ['settings.destroy', $setting->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('settings.show', [$setting->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('settings.edit', [$setting->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
