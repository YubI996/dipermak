@extends('mold.app')
@section('content-title')
Edit Kegiatan
@endsection

@section('content')
   
       @include('adminlte-templates::common.errors')
       {{-- <div class="box box-primary">
           <div class="box-body">
               <div class="row"> --}}
                   {!! Form::model($kegiatan, ['route' => ['kegiatans.update', $kegiatan->id], 'method' => 'patch']) !!}

                        @include('kegiatans.fields')

                   {!! Form::close() !!}
               {{-- </div>
           </div>
       </div> --}}
@endsection