@extends('mold.app')

@section('content')
    <section class="content-header">
    <div class="d-flex justify-content-between">
         <div class="mr-auto p-2">
            <h1>Dokumentasi</h1></div>
        <div class="p-2">
            <h1>
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('dokumentasis.create') }}">Add New</a>
            </h1>
        </div>
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

