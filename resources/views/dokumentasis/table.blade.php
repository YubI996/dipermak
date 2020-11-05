<div class="table-responsive">
    <table class="table" id="dokumentasis-table">
        <thead>
            <tr>
                <th>Keg Id</th>
        <th>Rt Id</th>
        <th>Foto</th>
        <th>Keterangan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dokumentasis as $dokumentasi)
            <tr>
                <td>{{ $dokumentasi->keg_id }}</td>
            <td>{{ $dokumentasi->rt_id }}</td>
            <td>{{ $dokumentasi->foto }}</td>
            <td>{{ $dokumentasi->keterangan }}</td>
                <td>
                    {!! Form::open(['route' => ['dokumentasis.destroy', $dokumentasi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('dokumentasis.show', [$dokumentasi->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('dokumentasis.edit', [$dokumentasi->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
