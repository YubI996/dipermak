<!-- Jenis Keg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_keg', 'Jenis Keg:') !!}
    {!! Form::select('jenis_keg', $jenKegItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jenKegs.index') }}" class="btn btn-default">Cancel</a>
</div>
