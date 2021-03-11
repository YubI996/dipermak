@extends('mold.app')
{{-- 
    $kec->with('kel')->get()  dapat 
    $kel->with('rt')->get() 
    --}}
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-9">

                            <h3 class="card-title">Daftar Kecamatan, Kelurahan, dan Rukun Tetangga di Kota Bontang</h3>
                        </div>
                        <div class="col-3 align-self-end">

                            <div class="input-group">
                                <button type="button" class="btn btn-default dropdown-toggle w-auto" data-toggle="dropdown"  style="width:100%;">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a href="{{route('kecamatans.create')}}">Kecamatan</a></li>
                                    <li class="dropdown-item"><a href="{{route('kelurahans.create')}}">Kelurahan</a></li>
                                    <li class="dropdown-item"><a href="{{route('rts.create')}}">Rukun Tetangga</a></li>
                                    {{-- <li class="dropdown-divider"></li> --}}
                                </ul>
                                <!-- /btn-group -->
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                </div>
                <!-- ./card-header -->
                <div class="card-body p-0">
                    <table class="table table-hover">
                    <tbody>
                        @foreach ($kecs as $kec)
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td>
                                <i class="fas fa-caret-right fa-fw"></i>
                                Kecamatan {{$kec->nama_kec}}
                            </td>
                        </tr>
                        <tr class="expandable-body">
                            <td>
                                <div class="p-0">
                                    <table class="table table-hover">
                                        <tbody>
                                            @foreach ($kec->kelurahan as $kel)
                                                
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="fas fa-caret-right fa-fw"></i>
                                                    Kelurahan {{$kel->nama_kel}}
                                                    {{-- Kelurahan Belimbing --}}
                                                </td>
                                            </tr>
                                            @php
                                                $rt = $kel->rt->count();
                                            @endphp
                                                
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{$rt}} Rukun Tetangga.
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-9">

                            <h3 class="card-title">Daftar User</h3>
                        </div>
                        <div class="col-3 align-self-end">

                            <div class="input-group">
                                <a href="{{route('users.create')}}">
                                    <button type="button" class="btn btn-default">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <!-- /btn-group -->
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                </div>
                <!-- ./card-header -->
                <div class="card-body p-2">
                    <table id="tabel1" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>e-mail</th>
                                <th>role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->nama_role}}</td>
                                <td>
                                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Jenis Kegiatan</h3>
                </div>
                <div class="card-body">
                    <table id="tabel1" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jenis Kegiatan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenKegs as $jk)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$jk->jenis_keg}}</td>
                                <td>
                                    {!! Form::open(['route' => ['jenKegs.destroy', $jk->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{{ route('jenKegs.show', [$jk->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('jenKegs.edit', [$jk->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>

@endsection
