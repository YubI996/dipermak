@extends('mold.app')

@section('content')
    <div class="content">
        @include('flash::message')
                <div class="card card-default">
                    <div class="card-header">
                <div class="d-flex">
                <div class="mr-auto p-2">
                    <h1>Kegiatan</h1></div>
                <div class="p-2">
                    <h1>
                    <a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('kegiatans.create') }}">Add New</a>
                    </h1></div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('kegiatans.table')
            </div>
            <!-- /.card-body -->
        </div>
        {{-- datatable ex end --}}
    </div>
@endsection
