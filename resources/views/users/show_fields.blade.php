<ul>
    <li>
        <!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nama : ') !!}
    <p>{{ $user->name }}</p>
</div>
    </li>
    <li>
        <!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email : ') !!}
    <p>{{ $user->email }}</p>
</div>
    </li>
    <li>
        <!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', 'Role :') !!}
    <p>{{ $user->role->nama_role }}</p>
</div>
    </li>
    <li>
        <!-- Rt Id Field -->
<div class="form-group">
    {!! Form::label('rt_id', 'RT :') !!}
    <p>{{ 'RT '.$user->rt->nama_rt.' Kelurahan '.$user->rt->kelurahan->nama_kel }}</p>
</div>
    </li>
    <li>
        <!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', 'Foto :') !!}
    <img src="{{url('storage/'.$user->foto)}}" alt="foto" width="40rem" height="40rem">
    {{-- <p>{{ $user->foto }}</p> --}}
</div>
    </li>
    
</ul>




<!-- Email Verified At Field -->
{{-- <div class="form-group">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div> --}}

{{-- <!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div> --}}







<!-- Remember Token Field -->
{{-- <div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $user->remember_token }}</p>
</div> --}}

