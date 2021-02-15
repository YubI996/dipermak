@extends('mold.app')
@section('content-title')
Edit User
@endsection
@section('content')

       @include('adminlte-templates::common.errors')
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('users.fields')

                   {!! Form::close() !!}
@endsection