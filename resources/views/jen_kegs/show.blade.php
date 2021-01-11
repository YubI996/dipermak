@extends('mold.app')

@section('content')
    <section class="content-header">
        <h1>
            Jen Keg
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('jen_kegs.show_fields')
                    <a href="{{ route('jenKegs.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
