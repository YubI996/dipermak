<!-- Keg Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keg_id', 'Keg Id:') !!}
    {!! Form::select('keg_id', $kegiatanItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto') !!}
</div>
<div class="clearfix"></div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dokumentasis.index') }}" class="btn btn-default">Cancel</a>
</div>
