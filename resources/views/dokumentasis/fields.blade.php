<!-- Keg Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keg_id', 'Keg Id:') !!}
    {!! Form::select('keg_id', $kegiatanItems, Request::old('kegiatan_id'), ['class' => 'form-control','placeholder'=>'Pilih Kegiatan']) !!}
</div>

<!-- Rt Id Field -->
{{-- <div class="form-group col-sm-6"> --}}
    {{-- {!! Form::label('rt_id', 'Rt Id:') !!} --}}
    {!! Form::hidden('rt_id', Auth::user()->rt_id) !!}
{{-- </div> --}}

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto',['name' => 'foto[]','multiple']) !!}
</div>
<div class="clearfix"></div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dokumentasis.index') }}" class="btn btn-default">Cancel</a>
</div>
