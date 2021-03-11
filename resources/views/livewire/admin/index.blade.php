<div>
    {{-- flash message --}}
    <div class="col-md-10 mt-3">
        @include('mold.includes.livewire_flash_messages')
    </div>
    <br>


    <div class="row-lg-12">
        
        <!-- kecamatan Field -->
        <div class="form-group">
            <div class="row p-auto">
                <div class="col-1">
                    {!! Form::label('kecamatan', 'Kecamatan :') !!}
                </div>
                <div class="col-11 m-auto">
                    {!! Form::select(null, $kecamatanItems, $kec, ['class' => 'form-control','placeholder' => 'Pilih Kecamatan','wire:model.lazy' => 'kec']) !!}
                    {{-- {!! Form::select(null, $kecamatanItems, Request::old('kecamatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kecamatan','wire:model.lazy' => 'kec']) !!} --}}
                </div>
            </div>
        </div>

        <!-- kelurahan Field -->
        @if ($kec != 0 && !is_null($kec))
        <div class="form-group">
            <div class="row p-auto">
                <div class="col-1">
                    {!! Form::label('kelurahan', 'Kelurahan :') !!}

                </div>
                <div class="col-11">
                    {!! Form::select(null, $kelurahanItems, $kel, ['class' => 'form-control','placeholder' => 'Pilih Kelurahan','wire:model.lazy' => 'kel']) !!}

                </div>
            </div>
        </div>
        @endif

        <!-- Rt Id Field -->
        @if ($kel != 0 && !is_null($kel))
            <div class="form-group">
            <div class="row p-auto">
                    <div class="col-1">
                        {!! Form::label('rt_id', 'RT:') !!}
            
                    </div>
                    <div class="col-11">
                        {!! Form::select('rt_id', $rtItems,$rtid, ['class' => 'form-control','placeholder' => 'Pilih RT','wire:model.lazy' => 'rtid']) !!}
                    </div>
            </div>
        </div>
        @endif
        
    </div>
    <div class="row">
        <div class="col">
            <a href="#" class="m-2 btn btn-secondary" type="button"
                            onclick="confirm('Ekspor data dalam bentuk excel ?'.$dataKec.'-'.$dataKel.'-'.$dataRT) || event.stopImmediatePropagation()"
                            wire:click="exportTable()">
                            Excel
                        </a>
            <table id="tabel" class="table table-bordered table-striped table-hover" >
                <thead>
                    <tr>
                        <th class="align-middle">Pagu Kecamatan</th>
                        <th class="align-middle">Pagu Kelurahan</th>
                        <th class="align-middle">Pagu RT</th>
                        <th class="align-middle">Total Partisipasi</th>
                        <th class="align-middle">Partisipasi Barang</th>
                        <th class="align-middle">Partisipasi Jasa</th>
                        <th class="align-middle">Partisipasi Uang</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($kegiatans as $kegiatan) --}}
                    <tr>
                        <td>{{'Rp. '.number_format($dataKec['pagu'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataKel['pagu'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataRT['pagu'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataKec['totPart'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataKec['partBar'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataKec['partJas'],2,',','.')}}</td>
                        <td>{{'Rp. '.number_format($dataKec['partUa'],2,',','.')}}</td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
