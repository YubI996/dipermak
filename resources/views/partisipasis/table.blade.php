<div class="table-responsive">
    <table class="table" id="partisipasis-table">
        <thead>
            <tr>
                <th>Keg Id</th>
        <th>Deskripsi</th>
        <th>Jenis</th>
        <th>Nominal</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($partisipasis as $partisipasi)
            <tr>
                <td>{{ $partisipasi->keg_id }}</td>
            <td>{{ $partisipasi->deskripsi }}</td>
            <td>{{ $partisipasi->jenis }}</td>
            <td>{{ $partisipasi->nominal }}</td>
                <td>
                    {!! Form::open(['route' => ['partisipasis.destroy', $partisipasi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('partisipasis.show', [$partisipasi->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('partisipasis.edit', [$partisipasi->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
