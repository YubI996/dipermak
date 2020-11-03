<!-- Keg Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keg_id', 'Keg Id:') !!}
    {!! Form::select('keg_id', $kegiatanItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Rt Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rt_id', 'Rt Id:') !!}
    {!! Form::number('rt_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis', 'Jenis:') !!}
    {!! Form::select('jenis', ['barang' => 'Barang', 'jasa' => 'Jasa'], null, ['class' => 'form-control']) !!}
</div>

<!-- Nominal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nominal', 'Nominal:') !!}
    {!! Form::number('nominal', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('partisipasis.index') }}" class="btn btn-default">Cancel</a>
</div>
