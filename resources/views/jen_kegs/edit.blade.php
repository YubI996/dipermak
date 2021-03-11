@extends('mold.app')
@section('content-title')
    Edit Jenis Kegiatan
@endsection
@section('content')
    
    <div class="content">
        @include('adminlte-templates::common.errors')
        
                    {!! Form::model($jenKeg, ['route' => ['jenKegs.update', $jenKeg->id], 'method' => 'patch']) !!}

                            @include('jen_kegs.fields')

                    {!! Form::close() !!}
            
    </div>
@endsection