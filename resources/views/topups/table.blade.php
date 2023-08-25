<div class="table-responsive">
    <table class="table" id="topups-table">
        <thead>
            <tr>
                <th>Setting By</th>
                <th>Customer Id</th>
                <th>Exp Date</th>
                <th>Price</th>
                <th>Send Limit</th>
                <th>per day limit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($topups as $topup)
            <tr>
                <td>{{ $user[$topup->user_id - 1]['email'] }}</td>
                <td>{{ $user[$topup->customer_id - 1]['email'] }}</td>
                <td>{{ $topup->exptime }}</td>
                <td>{{ $topup->price }}</td>
                <td>{{ $topup->smslimit }}</td>
                <td>{{ $topup->per_day_limit }}</td>
                <td>
                    {!! Form::open(['route' => ['topups.destroy', $topup->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('topups.show', [$topup->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('topups.edit', [$topup->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
