@extends('mold.app')
@section('content-title')
    Edit Dokumentasi
@endsection
@section('content')
    
                   {!! Form::model($dokumentasi, ['route' => ['dokumentasis.update', $dokumentasi->id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}

                        {{-- @include('dokumentasis.fields') --}}
                        @livewire('fields-dokumentasi',['edit_mode' => true, 'did' =>  $dokumentasi->id])

                   {!! Form::close() !!}
               
@endsection