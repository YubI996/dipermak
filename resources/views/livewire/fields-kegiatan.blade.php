<div>

    <div class="row p-auto">
        <div class="col-1">
            {!! Form::label('nama_keg', 'Nama Kegiatan :') !!}
        </div>
        <div class="col-11">
            {!! Form::textarea('nama_keg', null, ['class' => 'form-control mb-3']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="row p-auto">
            <div class="col-1">
                {!! Form::label('kecamatan', 'Kecamatan :') !!}
            </div>
            <div class="col-11 m-auto">
                {!! Form::select(null, $kecamatanItems, Request::old('kecamatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kecamatan','wire:model' => 'kec']) !!}
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
                {!! Form::select(null, $kelurahanItems, Request::old('kelurahan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kelurahan','wire:model' => 'kel']) !!}

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
                    {!! Form::select('rt_id', $rtItems,Request::old('rt_id'), ['class' => 'form-control','placeholder' => 'Pilih RT','wire:model' => 'rtid']) !!}
                </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-1">
            {!! Form::label('pagu', 'Pagu :     ') !!}
        </div>
        <div class="col-11">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
                    {!! Form::number('pagu', null, ['class' => 'form-control','maxlength' => 255,'wire:model' => 'pagu']) !!}
                </div>
            </div>
    </div>

    <!-- Target Field -->

    <div class="row mb-3">
        <div class="col-1">
            {!! Form::label('target', 'Target:') !!}
        </div>
        <div class="col-3">
                <div class="input-group">
                    {!! Form::number(null, null, ['class' => 'form-control','maxlength' => 3,'placeholder' => 'Persentase','wire:model' => 'per']) !!}
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            %
                        </div>
                    </div>
                </div><!-- input group -->
        </div>
        <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        Rp
                        </div>
                    </div>
                    {!! Form::number('target', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Nominal','wire:model' => 'nom']) !!}
                </div><!-- input group -->
        </div>
    </div>

    <div class="row">
        <div class="col-1">
            {!! Form::label('tgl_mulai', 'Tanggal Mulai:') !!}
        </div>
        <div class="col-11">
            <!-- {!! Form::text('tgl_mulai', old('tgl_mulai', ''), ['class' => 'form-control datetimepicker-input mb-3','id'=>'tgl_mulai', 'data-target'=> '#tgl_mulai','wire:model' => 'tm']) !!} -->
            {{-- <div class="input-group date mb-3" id="tgl_mulai" data-target-input="nearest">
                <div class="input-group-append" data-target="#tgl_mulai" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                @if (isset($kegiatan))
                <input type="text" value="{{$kegiatan->tgl_mulai}}" class="form-control datetimepicker-input" name="tgl_mulai" data-target="#tgl_mulai"/>
                @else
                <input type="text" class="form-control datetimepicker-input" name="tgl_mulai" data-target="#tgl_mulai"/>
                @endif
            </div> --}}
        </div>
    </div>

    <div class="row">
        <div class="col-1">
            {!! Form::label('tgl_selesai', 'Tanggal Selesai:') !!}
        </div>
        <div class="col-11">
            {!! Form::text('tgl_selesai', old('tgl_selesai', ''), ['class' => 'form-control datetimepicker-input mb-3','id'=>'tgl_selesai', 'data-target'=> '#tgl_selesai','wire:model' => 'ts']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-1">

            {!! Form::label('approval', 'Approval:') !!}
        </div>
        <div class="col-11 icheck-success mb-3">

            <label class="checkbox-inline">
                {!! Form::checkbox('approval', '1', ['wire:model' => 'ap']) !!}
            </label>
        </div>
    </div>

    <div class="row">
        <div class="col-1">

            {!! Form::label('jen_keg', 'Jenis Keg:') !!}
        </div>
        <div class="col-11">
            {!! Form::select('jen_keg', $jen_kegItems, Request::old('jenKeg_id'), ['class' => 'form-control mb-3']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-1">
            {!! Form::label('volume', 'Volume:') !!}
        </div>
        <!-- <input class="form-control" maxlength="255" id="inlineFormInputGroup" id="volume" name="volume" type="text"> -->
        <div class="col-11 mb-3">
            <div class="input-group">
                {!! Form::text('volume', null, ['class' => 'form-control','maxlength' => 255]) !!}
                <div class="input-group-prepend">
                    <div class="input-group-text">Satuan</div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mb-3">
        <div class="d-flex">
            {{ Form::button('<i class="fas fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-app bg-success'] )  }}
        </div>
        
        <div class="d-flex">
            <a href="{{ route('kegiatans.index') }}" class="btn btn-app bg-warning"><i class="fas fa-window-close"></i>Cancel</a>
        </div>
    </div>

</div>
