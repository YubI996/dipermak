<div class="table-responsive">
    <table class="table" id="kecamatans-table">
        <thead>
            <tr>
                <th>Nama Kec</th>
        <th>Kota Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kecamatans as $kecamatan)
            <tr>
                <td>{{ $kecamatan->nama_kec }}</td>
            <td>{{ $kecamatan->kota->nama_kota }}</td>
                <td>
                    {!! Form::open(['route' => ['kecamatans.destroy', $kecamatan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kecamatans.show', [$kecamatan->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('kecamatans.edit', [$kecamatan->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
