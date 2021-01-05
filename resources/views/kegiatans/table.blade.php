
        <table id="tabel1" class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th class="align-middle">Nama Kegiatan</th>
                    <th class="align-middle">RT</th>
                    <th class="align-middle">Tanggal Mulai</th>
                    <th class="align-middle">Tanggal Selesai</th>
                    <th class="align-middle">Approval</th>
                    <th class="align-middle">Jenis Kegiatan</th>
                    <th class="align-middle">Pagu</th>
                    <th class="align-middle">Target partisipasi</th>
                    <th class="align-middle">Pesentase</th>
                    <th class="align-middle">Volume</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($kegiatans as $kegiatan)
                <tr>
                    <td>{{ substr($kegiatan->nama_keg,0, 30).'...' }}</td>
                    <td>{{ 'RT '.$kegiatan->rt->nama_rt.' Kelurahan '.$kegiatan->rt->kelurahan->nama_kel }}</td>
                    <td>{{  \Carbon\Carbon::parse($kegiatan->tgl_mulai)->translatedFormat('l, d F Y')  }}</td>
                    <td>{{ \Carbon\Carbon::parse($kegiatan->tgl_selesai)->translatedFormat('l, d F Y')  }}</td>
                    <td>{{ $kegiatan->approval == "1" ? 'Disetujui' : 'Belum Disetujui' }}</td>
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
                            <a href="{{ route('kegiatans.show', [$kegiatan->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('kegiatans.edit', [$kegiatan->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


 