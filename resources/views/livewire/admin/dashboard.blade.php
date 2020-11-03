<div>
    <div>
        
    <!-- kecamatan Field -->
<div class="form-group row-sm-6">
    {!! Form::label('kecamatan', 'Kecamatan :') !!}
    {!! Form::select(null, $kecamatanItems, Request::old('kecamatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kecamatan','wire:model' => 'kec']) !!}
</div>
<!-- kelurahan Field -->
<div class="form-group row-sm-6">
    {!! Form::label('kelurahan', 'Kelurahan :') !!}
    {!! Form::select(null, $kelurahanItems, Request::old('kelurahan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kelurahan','wire:model' => 'kel']) !!}
</div>
<!-- Jen Keg Field -->
<!-- Rt Id Field -->
<div class="form-group row-sm-6">
    {!! Form::label('rt_id', 'RT:') !!}
    {!! Form::select('rt_id', $rtItems,Request::old('rt_id'), ['class' => 'form-control','placeholder' => 'Pilih RT']) !!}
</div>

<!-- Pagu Field -->
<div class="input-group">

    {!! Form::label('pagu', 'Pagu :     ') !!}
    <div class="input-group-prepend">
        <div class="input-group-text">Rp</div>
      </div>
    {!! Form::number('pagu', null, ['class' => 'form-control','maxlength' => 255,'wire:model' => 'pagu']) !!}
</div>


<!-- Target Field -->
<div class="form-group col-sm-6">
    {!! Form::label('target', 'Target:') !!}
    Rp
    {!! Form::number(null, null, ['class' => 'form-control','maxlength' => 3,'placeholder' => 'Persentase','wire:model' => 'per']) !!}
    {!! Form::number('target', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Nominal','wire:model' => 'nom']) !!}
</div>
    </div>
</div>
