@extends('mold.app')

@section('content')
    <section class="content-header">
        <h1>
            Jen Keg
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        
                    {!! Form::model($jenKeg, ['route' => ['jenKegs.update', $jenKeg->id], 'method' => 'patch']) !!}

                            @include('jen_kegs.fields')

                    {!! Form::close() !!}
            
    </div>
@endsection