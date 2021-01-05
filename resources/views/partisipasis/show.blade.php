@extends('mold.app')
<section class="content-title">
    <h1>
        Partisipasi
    </h1>
</section>

@section('content')
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('partisipasis.show_fields')
                    <a href="{{ route('partisipasis.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
