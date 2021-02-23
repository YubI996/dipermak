
<div class="row-sm-12">
    @if (isset($partisipasi))
    {{-- {{$partisipasi->}} --}}
    @livewire('admin.pilihrt',['rtid'=>$partisipasi->kegiatan->rt_id])
        @livewire('admin.nominal',['pid'=>$partisipasi->id]) 
        @else
        @livewire('admin.pilihrt')
        @livewire('admin.nominal',['pid'=>0])
    @endif
</div>
<!-- Jenis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis', 'Jenis Partisipasi(Barang/Jasa) :') !!}
    {!! Form::select('jenis', ['Barang' => 'Barang', 'Jasa' => 'Jasa', 'Uang' => 'Uang'], old('jenis'), ['class' => 'form-control','placeholder' => 'Pilih Jenis Partisipasi']) !!}
</div>
<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('partisipasis.index') }}" class="btn btn-default">Cancel</a>
</div>