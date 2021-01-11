@extends('mold.app')

@section('content')
    <section class="content-header">
        <h1>
            Jen Keg
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'jenKegs.store']) !!}

                        @include('jen_kegs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
