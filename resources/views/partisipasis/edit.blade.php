@extends('mold.app')
@section('content-title')
Edit Partisipasi
@endsection
@section('content')

       @include('adminlte-templates::common.errors')
    
                   {!! Form::model($partisipasi, ['route' => ['partisipasis.update', $partisipasi->id], 'method' => 'patch']) !!}

                        @include('partisipasis.fields')

                   {!! Form::close() !!}
@endsection