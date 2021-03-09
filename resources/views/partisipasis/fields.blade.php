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
<div class="form-group row">
    <div class="col-sm-2">

        {!! Form::label('jenis', 'Jenis Partisipasi :') !!}
    </div>
    <div class="col-sm-10">

        {!! Form::select('jenis', ['Barang' => 'Barang', 'Jasa' => 'Jasa', 'Uang' => 'Uang'], old('jenis'), ['class' => 'form-control','placeholder' => 'Pilih Jenis Partisipasi']) !!}
    </div>
</div>
<!-- Deskripsi Field -->
<div class="form-group col-sm-12 row">
    <div class="col-2">

        {!! Form::label('deskripsi', 'Deskripsi:') !!}
    </div>
    <div class="col-10">

        {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group row">
    <div class="m-1">

        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    <div class="m-1">

        <a href="{{ route('partisipasis.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>