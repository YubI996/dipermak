@extends('mold.app')
@section('content-title')
Jenis Kegiatan
@endsection
@section('content')
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-8"></div>
            <div class="col-md-1">

                <h1 class="pull-right">
                    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('jenKegs.create') }}">Add New</a>
                </h1>
            </div>
        </div>
        @include('flash::message')
        <div class="row-lg-12">
            @include('jen_kegs.table')
        </div>
            
@endsection

