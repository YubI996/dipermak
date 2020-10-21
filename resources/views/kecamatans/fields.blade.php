<!-- Nama Kec Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kec', 'Nama Kec:') !!}
    {!! Form::text('nama_kec', null, ['class' => 'form-control']) !!}
</div>

<!-- Kota Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kota_id', 'Kota Id:') !!}
    {!! Form::select('kota_id', $kotaItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('kecamatans.index') }}" class="btn btn-default">Cancel</a>
</div>
