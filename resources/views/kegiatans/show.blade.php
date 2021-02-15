@extends('mold.app')
@section('content-title')
Kegiatan
@endsection
@section('content')
       @include('adminlte-templates::common.errors')

                    @include('kegiatans.show_fields')
                    <a href="{{ route('kegiatans.index') }}" class="btn btn-default">Back</a>
             
@endsection
