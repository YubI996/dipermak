<div>
       
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
    <!-- Rt Id Field -->
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
    {{-- <div>
        {{$rtid}}
    </div> --}}
</div>
