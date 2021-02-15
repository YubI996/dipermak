@extends('mold.app')
@section('content-title')
Partisipasi
@endsection
@section('content')
       @include('adminlte-templates::common.errors')

                    @include('partisipasis.show_fields')
                    <a href="{{ route('partisipasis.index') }}" class="btn btn-default">Back</a>
@endsection
