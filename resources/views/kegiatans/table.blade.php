<div class="table-responsive">
    <table class="table" id="kegiatans-table">
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>RT</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Approval</th>
                <th>Jenis Kegiatan</th>
                <th>Pagu</th>
                <th>Target partisipasi</th>
                <th>Pesentase</th>
                <th>Volume</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kegiatans as $kegiatan)
            <tr>
                <td>{{ substr($kegiatan->nama_keg,0, 30).'...' }}</td>
            <td>{{ 'RT '.$kegiatan->rt->nama_rt.' Kelurahan '.$kegiatan->rt->kelurahan->nama_kel }}</td>
            <td>{{ date('d F Y',strtotime($kegiatan->tgl_mulai)) }}</td>
            <td>{{ date('d F Y',strtotime($kegiatan->tgl_selesai)) }}</td>
            <td>{{ $kegiatan->approval == 1 ? 'Disetujui' : 'Belum Disetujui' }}</td>
            <td>{{ $kegiatan->jenKeg->jenis_keg }}</td>
            <td>{{ 'Rp '.number_format($kegiatan->pagu,2,',','.') }}</td>
            <td>{{ 'Rp '.number_format($kegiatan->target,2,',','.') }}</td>
            @php
                $p = $kegiatan->target/$kegiatan->pagu*100;
            @endphp
            <td>{{ number_format($p,2,',','.').'%' }}</td>
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
