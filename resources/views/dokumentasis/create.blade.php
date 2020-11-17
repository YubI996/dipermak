@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dokumentasi
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'dokumentasis.store', 'enctype' => 'multipart/form-data']) !!}
                    {{-- {!! Form::open(['route' => 'dokumentasis.store', 'files' => true]) !!} --}}

                        @include('dokumentasis.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
