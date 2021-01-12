<div class="table-responsive">
    <table class="table table-bordered table-striped" id="tabel1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kegiatan</th>
                <th>Rukun Tetangga</th>
                <th>Foto</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dokumentasis as $dokumentasi)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $dokumentasi->keg_id }}</td>
                <td>{{ $dokumentasi->rt_id }}</td>
                <td><img src="{{ url('storage\\img\\dok\\'. $dokumentasi->foto)}}" alt="{{'foto '. $dokumentasi->name }}" width="40" height="40"></td>
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
