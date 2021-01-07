@extends('mold.app')

@section('content')
    <section class="content-header">
    <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Dokumentasi</h1></div>
        <div class="col-sm-6">
            <h1>
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('dokumentasis.create') }}">Add New</a>
            </h1></div>
    </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('dokumentasis.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

