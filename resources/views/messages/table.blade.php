<div class="table-responsive">
    <table class="table" id="messages-table">
        <thead>
            <tr>
                <th>User Id</th>
                <th>Message Rotation</th>
                <th>Message Body</th>
                <th>Attachment</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>

        @foreach($messages as $message)
            <tr>
                <td>{{ $user[$message['user_id'] - 1]['email'] }}</td>
            <td>{{ $message['messagerotation'] }}</td>
            <td>{!! $message['messagebody'] !!}</td>
            <td class="text-center">
                @foreach ($message['attachment'] as $attachment)
                    <img src="{{ asset('img/'. $attachment['attachment']) }}" class="pb-2" style="width: 75px;">
                @endforeach
            </td>
            
                <td>
                    {!! Form::open(['route' => ['messages.destroy', $message['id']], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('messages.show', [$message['id']]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('messages.edit', [$message['id']]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
