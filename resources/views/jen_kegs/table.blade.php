<div class="table-responsive">
    <table class="table" id="jenKegs-table">
        <thead>
            <tr>
                <th>Jenis Keg</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($jenKegs as $jenKeg)
            <tr>
                <td>{{ $jenKeg->jenis_keg }}</td>
                <td>
                    {!! Form::open(['route' => ['jenKegs.destroy', $jenKeg->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('jenKegs.show', [$jenKeg->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('jenKegs.edit', [$jenKeg->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
