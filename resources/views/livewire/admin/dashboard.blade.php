<div>
    <div>
    <!-- kecamatan Field -->
<div class="form-group row-sm-6">
    {!! Form::label('kecamatan', 'Kecamatan :') !!}
    {!! Form::select('kecamatan', $kecamatanItems, Request::old('kecamatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kecamatan','wire:model' => 'kec']) !!}
</div>
<!-- kelurahan Field -->
<div class="form-group row-sm-6">
    {!! Form::label('kelurahan', 'Kelurahan :') !!}
    {!! Form::select('kelurahan', $kelurahanItems, Request::old('kelurahan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kelurahan','wire:model' => 'kel']) !!}
</div>
<!-- Jen Keg Field -->
<!-- Rt Id Field -->
<div class="form-group row-sm-6">
    {!! Form::label('rt_id', 'RT:') !!}
    {!! Form::select('rt_id', $rtItems,Request::old('rt_id'), ['class' => 'form-control','placeholder' => 'Pilih RT']) !!}
</div>

<!-- Pagu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pagu', 'Pagu:') !!}
    {!! Form::number('pagu', null, ['class' => 'form-control','maxlength' => 255,'wire:model' => 'pagu']) !!}
</div>

<!-- Target Field -->
<div class="form-group col-sm-6">
    {!! Form::label('target', 'Target:') !!}
    Rp
    {!! Form::number('persentase', null, ['class' => 'form-control','maxlength' => 3]) !!}
    {!! Form::number('target', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>
<div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">@</span>
    </div>
    <input type="text" class="form-control rounded-right" required>
    <div class="invalid-feedback">
      Please choose a username.
    </div>
</div>

    </div>
</div>
