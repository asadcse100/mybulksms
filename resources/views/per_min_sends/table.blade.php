<div class="table-responsive">
    <table class="table" id="perMinSends-table">
        <thead>
            <tr>
                <th>Setting By</th>
                <th>Per Minute Sends</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($perMinSends as $perMinSend)
            <tr>
                <td>{{ $user[$perMinSend->user_id - 1]['email'] }}</td>
                <td>{{ $perMinSend->perminsend }}</td>
                <td>
                    <div class='btn-group'>
                        <a href="{{ route('perMinSends.show', [$perMinSend->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('perMinSends.edit', [$perMinSend->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
