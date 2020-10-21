<div class="table-responsive">
    <table class="table" id="rts-table">
        <thead>
            <tr>
                <th>Nama Rt</th>
        <th>Kel Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rts as $rt)
            <tr>
                <td>{{ $rt->nama_rt }}</td>
            <td>{{ $rt->kel_id }}</td>
                <td>
                    {!! Form::open(['route' => ['rts.destroy', $rt->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('rts.show', [$rt->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('rts.edit', [$rt->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
