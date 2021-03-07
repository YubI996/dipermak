<div class="table-responsive">
    <table class="table table-bordered table-striped" id="tabel1">
        <thead>
            <tr>
                <th class="align-middle">No.</th>
                <th class="align-middle">Kegiatan</th>
                <th class="align-middle">Rukun Tetangga</th>
                <th class="align-middle">Progress</th>
                <th class="align-middle">Foto</th>
                <th class="align-middle">Keterangan</th>
                <th class="align-middle">Di Input Pada</th>
                <th class="align-middle">Di Update Pada</th>
                <th class="align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dokumentasis as $dokumentasi)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $dokumentasi->kegiatan->nama_keg }}</td>
                <td>{{ 'RT '.$dokumentasi->rt->nama_rt.' Kelurahan '.$dokumentasi->rt->kelurahan->nama_kel }}</td>
                <td>{{ $dokumentasi->progres.'%' }}</td>
                <td><img src="{{ url('storage/'. $dokumentasi->foto)}}" alt="{{'foto '. $dokumentasi->name }}" width="40" height="40"></td>
                <td>{{ $dokumentasi->keterangan }}</td>
                <td>{{ \Carbon\Carbon::parse($dokumentasi->created_at)->translatedFormat('l, d F Y')}}</td>
                <td>{{ \Carbon\Carbon::parse( $dokumentasi->updated_at)->translatedFormat('l, d F Y') }}</td>                
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
