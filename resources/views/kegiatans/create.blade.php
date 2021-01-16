@extends('mold.app')
@section('content-title')
   Tambah Kegiatan
@endsection

@section('content')

    
        @include('adminlte-templates::common.errors')
        {{-- <div class="col">
            <div class="box-body">
                <div class="row"> --}}
                    {!! Form::open(['route' => 'kegiatans.store']) !!}

                        @include('kegiatans.fields')

                    {!! Form::close() !!}
                {{-- </div> --}}
                {{-- row --}}
            {{-- </div> --}}
            {{-- box body --}}
        {{-- </div> --}}
        {{-- box-primary --}}
    
@endsection
@section('content-footer')
    Pastikan Form terisi dengan benar.
@endsection
