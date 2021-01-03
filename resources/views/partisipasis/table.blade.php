<div class="table-responsive">
    <table class="table" id="partisipasis-table">
        <thead>
            <tr>
                <th>Kegiatan</th>
                <th>RT</th>
                <th>Deskripsi</th>
                <th>Jenis</th>
                <th>Nominal</th>
                <th>Di Input Pada</th>
                <th>Di Update Pada</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($partisipasis as $partisipasi)
            {{-- @php
                
                dd($partisipasi->kegiatan->nama_keg);
            @endphp --}}
            <tr>
            {{-- <td>{{ $partisipasi->keg_id }}</td> --}}
            <td>{{ $partisipasi->kegiatan['nama_keg'] }}</td>
            <td>{{ 'RT '.$partisipasi->rt->nama_rt.' Kelurahan '.$partisipasi->rt->kelurahan->nama_kel }}</td>
            <td>{{ $partisipasi->deskripsi }}</td>
            <td>{{ $partisipasi->jenis }}</td>
            <td>{{ $partisipasi->nominal }}</td>
            <td>{{ $partisipasi->created_at }}</td>
            <td>{{ $partisipasi->updated_at }}</td>
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
</div>
