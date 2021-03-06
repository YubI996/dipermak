@if (isset($dokumentasi))
    @livewire('admin.pilihrt',['rtid'=>$dokumentasi->kegiatan->rt_id])
@else
    @livewire('admin.pilihrt')
@endif

<!-- Keg Id Field -->
<div class="form-group row">
    <div class="col-sm-1">

        {!! Form::label('keg_id', 'Kegiatan :') !!}
    </div>
    <div class="col-sm-11">

        {!! Form::select('keg_id', $kegiatanItems, Request::old('kegiatan_id'), ['class' => 'form-control','placeholder'=>'Pilih Kegiatan']) !!}
    </div>
</div>

<!-- Rt Id Field -->
{{-- <div class="form-group row"> --}}
    {{-- {!! Form::label('rt_id', 'Rt Id:') !!} --}}
    {!! Form::hidden('rt_id', Auth::user()->rt_id) !!}
{{-- </div> --}}

<!-- progres Field -->
<div class="form-group row">
    <div class="col-1">
        {!! Form::label('progres', 'progres :') !!}
    </div>
    <div class="col-11">
        {!! Form::number('progres', null, ['class' => 'form-control','max'=>'100']) !!}
    </div>
</div>
    


<!-- Foto Field -->
<div class="form-group row">
    <div class="col-1">
        {!! Form::label('foto', 'Foto:') !!}
    </div>
    <div class="col-11">
        @if (isset($dokumentasi->id))
            <img src="{{ url('storage/'. $dokumentasi->foto)}}" alt="{{'foto '. $dokumentasi->name }}" width="40" height="40"></td><br>
        @endif
        {!! Form::file('foto',['name' => 'foto[]','multiple']) !!}
    </div>
</div>
    



<div class="clearfix"></div>

<!-- Keterangan Field -->
<div class="form-group row">
    <div class="col-1">
        
        
        {!! Form::label('keterangan', 'Keterangan:') !!}
    </div>
    <div class="col-11">

        {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group row">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dokumentasis.index') }}" class="btn btn-default">Cancel</a>
</div>
