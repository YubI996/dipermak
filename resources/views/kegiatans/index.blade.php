@extends('mold.app')

@section('content')
    <section class="content-header">
        <div class="row mb-2 d-flex">
         <div class="mr-auto p-2">
            <h1>Kegiatan</h1></div>
        <div class="p-2">
            <h1>
           <a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('kegiatans.create') }}">Add New</a>
            </h1></div>
    </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('kegiatans.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

