@livewire('admin.nominal')

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis', 'Jenis Partisipasi(Barang/Jasa) :') !!}
    {!! Form::select('jenis', ['barang' => 'Barang', 'jasa' => 'Jasa'], null, ['class' => 'form-control','placeholder' => 'Pilih Jenis Partisipasi']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('partisipasis.index') }}" class="btn btn-default">Cancel</a>
</div>