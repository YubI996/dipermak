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
                    <h3 class="card-title">Daftar Kecamatan, Kelurahan, dan Rukun Tetangga di Kota Bontang</h3>
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
                                                                    <td>{{$rt}} Rukun Tetangga(RT 1 - RT {{$rt}})</td>
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
    </div>
{{-- @php
    dd($kecamatans);
@endphp --}}
{{-- @foreach ($kecs as $kec)
    {{ $kec->nama_kec }}
    @foreach ($kec->kelurahan as $kel)
    {{ $kel->nama_kel }}
    @foreach ($kel->rt as $rt)
    {{ $rt->nama_rt }}
        @endforeach
    @endforeach
@endforeach --}}
@endsection
