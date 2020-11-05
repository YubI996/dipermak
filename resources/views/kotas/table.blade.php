<div class="table-responsive">
    <table class="table" id="kotas-table">
        <thead>
            <tr>
                <th>Nama Kota</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kotas as $kota)
            <tr>
                <td>{{ $kota->nama_kota }}</td>
                <td>
                    {!! Form::open(['route' => ['kotas.destroy', $kota->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kotas.show', [$kota->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('kotas.edit', [$kota->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
