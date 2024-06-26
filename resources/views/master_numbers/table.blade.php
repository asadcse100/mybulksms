<div class="table-responsive">
    <table class="table" id="masterNumbers-table">
        <thead>
            <tr>
            <th>User Id</th>
            <th>Country</th>
            <th>Number</th>
            <th>Message Rotation</th>
            <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($masterNumbers as $masterNumber)
            <tr>
            <td>{{ $user[$masterNumber->user_id - 1]['email'] }}</td>
            <td>{{ $country[$masterNumber->country - 1]['name'] }}</td>
            <td>{{ $masterNumber->number }}</td>
            <td>{{ $masterNumber->messageRotation }}</td>
                <td>
                    {!! Form::open(['route' => ['masterNumbers.destroy', $masterNumber->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('masterNumbers.show', [$masterNumber->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('masterNumbers.edit', [$masterNumber->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
