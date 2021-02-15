@extends('mold.app')
@section('content-title')
   Tambah User
@endsection
@section('content')
    @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'users.store', 'files' => true]) !!}

            @include('users.fields')

        {!! Form::close() !!}
@endsection
