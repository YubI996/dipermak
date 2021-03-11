@extends('mold.app')
@section('content-title')
   Tambah Kegiatan
@endsection

@section('content')

    
        @include('adminlte-templates::common.errors')
    
                    {!! Form::open(['route' => 'kegiatans.store']) !!}
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                        @livewire('fields-kegiatan')

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
