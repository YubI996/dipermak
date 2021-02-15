@extends('mold.app')
@section('content-title')
Dokumentasi
@endsection
@section('content')
    @include('adminlte-templates::common.errors')
        @include('dokumentasis.show_fields')
        <a href="{{ route('dokumentasis.index') }}" class="btn btn-default">Back</a>
@endsection
