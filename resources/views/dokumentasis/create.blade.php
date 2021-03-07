@extends('mold.app')
@section('content-title')
   Tambah Dokumentasi
@endsection
@section('content')
    
        @include('adminlte-templates::common.errors')
       
                    {!! Form::open(['route' => 'dokumentasis.store', 'enctype' => 'multipart/form-data']) !!}
                    {{-- {!! Form::open(['route' => 'dokumentasis.store', 'files' => true]) !!} --}}

                        {{-- @include('dokumentasis.fields') --}}
                        @livewire('fields-dokumentasi')
                    {!! Form::close() !!}
                
@endsection
