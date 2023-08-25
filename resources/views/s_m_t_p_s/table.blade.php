<div class="table-responsive">
    <table class="table" id="sMTPS-table">
        <thead>
            <tr>@if(auth()->user()->id == 1)
                <th>User Id</th>
                @endif
                <th>Host Name</th>
                <th>Smtp Username</th>
                <th>Smtp Password</th>
                <th>Smtp Port</th>
                <th>Encryption Method</th>
                <th>Defaut From Email</th>
                <th>Model Name</th>
                <th>SMTP Rotation</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sMTPS as $sMTP)
            <tr>
                @if(auth()->user()->id == 1)
                <td>{{ $user[$sMTP->user_id - 1]['email'] }}</td>
                @endif
                <td>{{ $sMTP->host_name }}</td>
                <td>{{ $sMTP->smtp_username }}</td>
                <td>{{ $sMTP->smtp_password }}</td>
                <td>{{ $sMTP->smtp_port }}</td>
                <td>{{ $sMTP->encryption_method }}</td>
                <td>{{ $sMTP->defaut_from_email }}</td>
                <td>{{ $sMTP->model_name }}</td>
                <td>{{ $sMTP->smtprotation }}</td>
                <td>
                    {!! Form::open(['route' => ['sMTPS.destroy', $sMTP->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sMTPS.show', [$sMTP->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('sMTPS.edit', [$sMTP->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
