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
            <div>
                @if ($checked)
                <div class="dropdown ml-4">
                    <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">With Checked
                        ({{ count($checked) }})</button>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item" type="button"
                            onclick="confirm('Anda yakin akan menghapus data terpilih??') || event.stopImmediatePropagation()"
                            wire:click="deleteRecords()">
                            Hapus
                        </a>
                        <a href="#" class="dropdown-item" type="button"
                            onclick="confirm('Anda yakin akan meng-ekspor data terpilih??') || event.stopImmediatePropagation()"
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
            Anda telah mencentang  <strong>{{ $dokumentasis->total() }}</strong> item.
        </div>
        @else
        <div>
            Anda telah mencentang <strong>{{ count($checked) }}</strong> item, Apa Anda ingin mencentang 
            <strong>{{ $dokumentasis->total() }}</strong> item?
            <a href="#" class="ml-2" wire:click="selectAll">Ya, pilih semua.</a>
        </div>
        @endif

    </div>
    @endif


    <div class="table table-bordered table-striped table-hover">
        <table class="table table-bordered table-striped table-hover" id="tabel">
        <thead>
            <tr>
                <th><input type="checkbox" wire:model="selectPage"></th>
                <th class="align-middle">Kegiatan</th>
                <th class="align-middle">Rukun Tetangga</th>
                <th class="align-middle">Progress</th>
                <th class="align-middle">Foto</th>
                <th class="align-middle">Keterangan</th>
                <th class="align-middle">Di Input Pada</th>
                <th class="align-middle">Di Update Pada</th>
                <th class="align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dokumentasis as $dokumentasi)
            <tr class="@if ($this->isChecked($dokumentasi->id))
                    table-primary
                @endif">
                <td><input type="checkbox" value="{{ $dokumentasi->id }}" wire:model="checked"></td>                    
                <td>{{ $dokumentasi->kegiatan->nama_keg }}</td>
                <td>{{ 'RT '.$dokumentasi->rt->nama_rt.' Kelurahan '.$dokumentasi->rt->kelurahan->nama_kel }}</td>
                <td>{{ $dokumentasi->progres.'%' }}</td>
                <td><img src="{{ url('storage/'. $dokumentasi->foto)}}" alt="{{'foto '. $dokumentasi->name }}" width="40" height="40"></td>
                <td>{{ $dokumentasi->keterangan }}</td>
                <td>{{ \Carbon\Carbon::parse($dokumentasi->created_at)->translatedFormat('l, d F Y')}}</td>
                <td>{{ \Carbon\Carbon::parse( $dokumentasi->updated_at)->translatedFormat('l, d F Y') }}</td>                
                <td>
                    {!! Form::open(['route' => ['dokumentasis.destroy', $dokumentasi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('dokumentasis.show', [$dokumentasi->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('dokumentasis.edit', [$dokumentasi->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
                    
        <div class="row mt-4">
            <div class="col-sm-6 offset-5">
                {{ $dokumentasis->links() }}
            </div>
        </div>

    </div>
</div>
