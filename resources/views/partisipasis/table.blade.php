
    
    <table id="tabel1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="align-middle">No.</th>
                <th class="align-middle">Kegiatan</th>
                <th class="align-middle">RT</th>
                <th class="align-middle">Deskripsi</th>
                <th class="align-middle">Jenis</th>
                <th class="align-middle">Nominal</th>
                <th class="align-middle">Di Input Pada</th>
                <th class="align-middle">Di Update Pada</th>
                <th class="align-middle">Action</th>
            </tr>
        </thead>
        <tbody >
        @foreach($partisipasis as $partisipasi)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $partisipasi->kegiatan->nama_keg }}</td>
                <td>{{ 'RT '.$partisipasi->rt->nama_rt.' Kelurahan '.$partisipasi->rt->kelurahan->nama_kel }}</td>
                <td>{{ $partisipasi->deskripsi}}</td>
                <td>{{ $partisipasi->jenis }}</td>
                <td>{{ $partisipasi->nominal }}</td>
                <td>{{ \Carbon\Carbon::parse($partisipasi->created_at)->translatedFormat('l, d F Y')}}</td>
                <td>{{ \Carbon\Carbon::parse( $partisipasi->updated_at)->translatedFormat('l, d F Y') }}</td>
                <td>
                    {!! Form::open(['route' => ['partisipasis.destroy', $partisipasi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('partisipasis.show', [$partisipasi->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('partisipasis.edit', [$partisipasi->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

