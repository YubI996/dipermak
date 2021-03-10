@extends('mold.app')
@section('content-title')
    Tambah Partisipasi
@endsection
@section('content')
   
        @include('flash::message') 

        @include('adminlte-templates::common.errors')
        
                    {!! Form::open(['route' => 'partisipasis.store']) !!}

                        @include('partisipasis.fields')

                    {!! Form::close() !!}
               
@endsection
