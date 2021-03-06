<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
        {{-- <th>Email Verified At</th> --}}
        {{-- <th>Password</th> --}}
        <th>Role</th>
        <th>RT</th>
        <th>Foto</th>
        {{-- <th>Remember Token</th> --}}
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            {{-- <td>{{ $user->email_verified_at }}</td> --}}
            {{-- <td>{{ $user->password }}</td> --}}
            <td>{{ $user->role->nama_role }}</td>
            <td>{{ $user->rt_id }}</td>
            <td><img src="{{ url('storage\\'.$user->foto)}}" alt="{{'foto '. $user->name }}" width="40" height="40"></td>
            {{-- <td>{{ $user->remember_token }}</td> --}}
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
