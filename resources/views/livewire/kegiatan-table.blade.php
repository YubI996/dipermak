<div>
    @livewire('admin.pilihrt')
    {{-- pagination count --}}
    <div class="d-flex justify-content-between align-content-center mb-2">
        <div class="d-flex">
            <div>
                <div class="d-flex align-items-center ml-4">
                    <label for="paginate" class="text-nowrap mr-2 mb-0">Per Page</label>
                    <select wire:model="paginate" name="paginate" id="paginate" class="form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>
            </div>
            <div>
                <div class="d-flex align-items-center ml-4">
                    <label for="paginate" class="text-nowrap mr-2 mb-0">Filter dengan RT</label>
                    <select class="form-control form-control-sm" wire:model="selectedRt">
                        <option value="">Semua RT</option>
                        {{-- @php
                            dd($classes);
                            
                        @endphp --}}
                        @foreach ($rts as $item)
                        <option value="{{ $item->id }}">{{ 'RT '.$item->nama_rt.', Kelurahan '.$item->kelurahan->nama_kel.', Kecamatan '.$item->kelurahan->kecamatan->nama_kec }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- @if ($selectedClass != 0 && !is_null($selectedClass))
            <div>
                <div class="d-flex align-items-center ml-4">
                    <label for="paginate" class="text-nowrap mr-2 mb-0">Section</label>
                    <select class="form-control form-control-sm" wire:model="selectedSection">
                        <option value="">Select a Section</option>
                        @foreach ($sections as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif --}}
            <div>
                @if ($checked)
                <div class="dropdown ml-4">
                    <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">With Checked
                        ({{ count($checked) }})</button>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item" type="button"
                            onclick="confirm('Are you sure you want to delete these Records?') || event.stopImmediatePropagation()"
                            wire:click="deleteRecords()">
                            Hapus
                        </a>
                        <a href="#" class="dropdown-item" type="button"
                            onclick="confirm('Are you sure you want to export these Records?') || event.stopImmediatePropagation()"
                            wire:click="exportSelected()">
                            Ekspor
                        </a>

                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class=" col-md-4">
            <input type="search" wire:model.debounce.500ms="search" class="form-control"
                placeholder="Cari berdasarkan nama kegiatan, sumber dana, jenis kegiatan...">
        </div>
    </div>

    {{-- flash message --}}
    <div class="col-md-10 mt-3">
        @include('mold.includes.livewire_flash_messages')
    </div>
    <br>

    @if ($selectPage)
    <div class="col-md-10 mb-2">
        @if ($selectAll)
        <div>
            Anda telah mencentang  <strong>{{ $students->total() }}</strong> item.
        </div>
        @else
        <div>
            Anda telah mencentang <strong>{{ count($checked) }}</strong> item, Apa Anda ingin mencentang 
            <strong>{{ $students->total() }}</strong> item?
            <a href="#" class="ml-2" wire:click="selectAll">Ya, pilih semua.</a>
        </div>
        @endif

    </div>
    @endif


    <div class="table table-bordered table-striped table-hover">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th class="align-middle">RT</th>
                    <th class="align-middle">Nama Kegiatan</th>
                    <th class="align-middle">Tanggal Mulai</th>
                    <th class="align-middle">Tanggal Selesai</th>
                    <th class="align-middle">Sumber Dana</th>
                    <th class="align-middle">Approval</th>
                    <th class="align-middle">Jenis Kegiatan</th>
                    <th class="align-middle">Pagu</th>
                    <th class="align-middle">Target partisipasi</th>
                    <th class="align-middle">Pesentase</th>
                    <th class="align-middle">Volume</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($kegiatans as $kegiatan)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ 'RT '.$kegiatan->rt->nama_rt.' Kelurahan '.$kegiatan->rt->kelurahan->nama_kel }}</td>
                    <td>{{ substr($kegiatan->nama_keg,0, 30).'...' }}</td>
                    <td>{{  \Carbon\Carbon::parse($kegiatan->tgl_mulai)->translatedFormat('l, d F Y')  }}</td>
                    <td>{{ \Carbon\Carbon::parse($kegiatan->tgl_selesai)->translatedFormat('l, d F Y')  }}</td>
                    <td>{{ $kegiatan->sumber_dana }}</td>
                    <td>{{ $kegiatan->approval == "1" ? 'Disetujui' : 'Belum Disetujui' }}</td>
                    <td>{{ $kegiatan->jenKeg->jenis_keg }}</td>
                    <td>{{ 'Rp '.number_format($kegiatan->pagu,2,',','.') }}</td>
                    <td>{{ 'Rp '.number_format($kegiatan->target,2,',','.') }}</td>
                    @php
                        $p = $kegiatan->target/$kegiatan->pagu*100;
                    @endphp
                    <td>{{ number_format($p,2,',','.').'%' }}</td>
                    <td>{{ $kegiatan->volume.' '.$kegiatan->satuan }}</td>
                    <td>
                        {!! Form::open(['route' => ['kegiatans.destroy', $kegiatan->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('kegiatans.show', [$kegiatan->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('kegiatans.edit', [$kegiatan->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
                    

    </div>
    <div class="row mt-4">
        <div class="col-sm-6 offset-5">
            {{ $kegiatans->links() }}
        </div>
    </div>
</div>
