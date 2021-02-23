<!-- Jenis Keg Field -->
<div class="form-group col-sm-12">
    <div class="row">
        <div class="col-sm-2">

            {!! Form::label('jenis_keg', 'Jenis Kegiatan :') !!}
        </div>
        <div class="col-sm-10">

            {{-- {!! Form::text('jenis_keg', $jenKegItems, null, ['class' => 'form-control']) !!} --}}
            {!! Form::text('jenis_keg', old('jenis_keg'), ['class' => 'form-control']) !!}
        </div>
    </div>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jenKegs.index') }}" class="btn btn-default">Cancel</a>
</div>
