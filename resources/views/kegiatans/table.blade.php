<div class="table-responsive">
    <table class="table" id="kegiatans-table">
        <thead>
            <tr>
                <th>Nama Keg</th>
        <th>Rt Id</th>
        <th>Tgl Mulai</th>
        <th>Tgl Selesai</th>
        <th>Approval</th>
        <th>Jen Keg</th>
        <th>Pagu</th>
        <th>Target</th>
        <th>Volume</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kegiatans as $kegiatan)
            <tr>
                <td>{{ $kegiatan->nama_keg }}</td>
            <td>{{ $kegiatan->rt->nama_rt }}</td>
            <td>{{ $kegiatan->tgl_mulai }}</td>
            <td>{{ $kegiatan->tgl_selesai }}</td>
            <td>{{ $kegiatan->approval }}</td>
            <td>{{ $kegiatan->jenKeg->jenis_keg }}</td>
            <td>{{ $kegiatan->pagu }}</td>
            <td>{{ $kegiatan->target }}</td>
            <td>{{ $kegiatan->volume }}</td>
                <td>
                    {!! Form::open(['route' => ['kegiatans.destroy', $kegiatan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kegiatans.show', [$kegiatan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('kegiatans.edit', [$kegiatan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
