@if (isset($dokumentasi))
    @livewire('admin.pilihrt',['rtid'=>$dokumentasi->kegiatan->rt_id])
@else
    @livewire('admin.pilihrt')
@endif
<!-- Keg Id Field -->
<div class="form-group row-sm-12">
    {!! Form::label('keg_id', 'Keg Id:') !!}
    {!! Form::select('keg_id', $kegiatanItems, Request::old('kegiatan_id'), ['class' => 'form-control','placeholder'=>'Pilih Kegiatan']) !!}
</div>

<!-- Rt Id Field -->
{{-- <div class="form-group row-sm-12"> --}}
    {{-- {!! Form::label('rt_id', 'Rt Id:') !!} --}}
    {!! Form::hidden('rt_id', Auth::user()->rt_id) !!}
{{-- </div> --}}

<!-- Foto Field -->
<div class="form-group row-sm-12">
    {!! Form::label('foto', 'Foto:') !!}
    @if (isset($dokumentasi->id))
        
    <img src="{{ url('storage/'. $dokumentasi->foto)}}" alt="{{'foto '. $dokumentasi->name }}" width="40" height="40"></td><br>
    @endif
    {!! Form::file('foto',['name' => 'foto[]','multiple']) !!}
</div>
<div class="clearfix"></div>

<!-- Keterangan Field -->
<div class="form-group row-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group row-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dokumentasis.index') }}" class="btn btn-default">Cancel</a>
</div>
