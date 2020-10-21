<!-- Nama Kota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kota', 'Nama Kota:') !!}
    {!! Form::text('nama_kota', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('kotas.index') }}" class="btn btn-default">Cancel</a>
</div>
