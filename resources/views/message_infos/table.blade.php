<div class="table-responsive">
    <table class="table" id="messageInfos-table">
        <thead>
            <tr>
                <th>Send To Email</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($messageInfos as $messageInfo)
            <tr>
                <td>{{ $messageInfo->email }}</td>
                        
                    @if($messageInfo->status == 0)
                    <td><span style="color:red">Waiting...</span></td>
                    @else($messageInfo->status == 3)
                    <td><span style="color:green">Compeleted</span></td>
                    @endif
      
                <td>
                    {!! Form::open(['route' => ['messageInfos.destroy', $messageInfo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('messageInfos.show', [$messageInfo->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('messageInfos.edit', [$messageInfo->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
