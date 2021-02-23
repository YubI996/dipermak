@extends('mold.app')

@section('content')
    <section class="content-header">
        <div class="row">
            <div class="col-md-1">
                <h1 class="pull-left">User</h1>
            </div>
            <div class="col-md-10"></div>
            <div class="col-md-1">

                <h1 class="pull-right">
                    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('users.create') }}">Add New</a>
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
                    @include('users.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

