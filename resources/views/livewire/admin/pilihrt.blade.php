<div>
       
    <!-- kecamatan Field -->
<div class="form-group">
    {!! Form::label('kecamatan', 'Kecamatan :') !!}
    {!! Form::select(null, $kecamatanItems, Request::old('kecamatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kecamatan','wire:model' => 'kec']) !!}
</div>
<!-- kelurahan Field -->
<div class="form-group">
    {!! Form::label('kelurahan', 'Kelurahan :') !!}
    {!! Form::select(null, $kelurahanItems, Request::old('kelurahan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kelurahan','wire:model' => 'kel']) !!}
</div>
<!-- Rt Id Field -->
<div class="form-group">
    {!! Form::label('rt_id', 'RT:') !!}
    {!! Form::select('rt_id', $rtItems,Request::old('rt_id'), ['class' => 'form-control','placeholder' => 'Pilih RT','wire:model' => 'rtid']) !!}
</div>
<div>
    {{$rtid}}
</div>
</div>
