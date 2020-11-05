<!-- Keg Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keg_id', 'Keg Id:') !!}
    {!! Form::select('keg_id', $kegiatanItems, Request::old('kegiatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kegiatan']) !!}
</div>

<!-- Rt Id Field -->
{{-- <div class="form-group col-sm-6"> --}}
    {{-- {!! Form::label('rt_id', 'Rt Id:') !!} --}}

    {!! Form::hidden('rt_id', Auth::user()->rt_id) !!}
{{-- </div> --}}

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
