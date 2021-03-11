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
                placeholder="Cari berdasarkan nama partisipasi, sumber dana, jenis partisipasi...">
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
            Anda telah mencentang  <strong>{{ $partisipasis->total() }}</strong> item.
        </div>
        @else
        <div>
            Anda telah mencentang <strong>{{ count($checked) }}</strong> item, Apa Anda ingin mencentang 
            <strong>{{ $partisipasis->total() }}</strong> item?
            <a href="#" class="ml-2" wire:click="selectAll">Ya, pilih semua.</a>
        </div>
        @endif

    </div>
    @endif


    <table id="tabel" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><input type="checkbox" wire:model="selectPage"></th>
                <th class="align-middle">RT</th>
                <th class="align-middle">Kegiatan</th>
                <th class="align-middle">Deskripsi</th>
                <th class="align-middle">Jenis</th>
                <th class="align-middle">Nominal</th>
                <th class="align-middle">Di Input Pada</th>
                <th class="align-middle">Di Update Pada</th>
                <th class="align-middle">Action</th>
            </tr>
        </thead>
        <tbody >
        @foreach($partisipasis as $partisipasi)
            <tr class="@if ($this->isChecked($partisipasi->id))
                    table-primary
                @endif">
                <td><input type="checkbox" value="{{ $partisipasi->id }}" wire:model="checked"></td>                    
                <td>{{ 'RT '.$partisipasi->rt->nama_rt.' Kelurahan '.$partisipasi->rt->kelurahan->nama_kel }}</td>
                <td>{{ $partisipasi->kegiatan->nama_keg }}</td>
                <td>{{ $partisipasi->deskripsi}}</td>
                <td>{{ $partisipasi->jenis }}</td>
                <td>{{ $partisipasi->nominal }}</td>
                <td>{{ \Carbon\Carbon::parse($partisipasi->created_at)->translatedFormat('l, d F Y')}}</td>
                <td>{{ \Carbon\Carbon::parse( $partisipasi->updated_at)->translatedFormat('l, d F Y') }}</td>
                <td>
                    {!! Form::open(['route' => ['partisipasis.destroy', $partisipasi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('partisipasis.show', [$partisipasi->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('partisipasis.edit', [$partisipasi->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
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
                {{ $partisipasis->links() }}
            </div>
        </div>

</div>
