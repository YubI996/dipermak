<!-- Nama Kel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kel', 'Nama Kel:') !!}
    {!! Form::text('nama_kel', null, ['class' => 'form-control']) !!}
</div>

<!-- Kec Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kec_id', 'Kec Id:') !!}
    {!! Form::select('kec_id', $kecamatanItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('kelurahans.index') }}" class="btn btn-default">Cancel</a>
</div>
