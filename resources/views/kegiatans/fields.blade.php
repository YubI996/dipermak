<!-- Nama Keg Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('nama_keg', 'Nama Keg:') !!}
    {!! Form::textarea('nama_keg', null, ['class' => 'form-control']) !!}
</div>

<!-- Rt Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rt_id', 'Rt Id:') !!}
    {!! Form::number('rt_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Mulai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_mulai', 'Tgl Mulai:') !!}
    {!! Form::text('tgl_mulai', null, ['class' => 'form-control','id'=>'tgl_mulai']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#tgl_mulai').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tgl Selesai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_selesai', 'Tgl Selesai:') !!}
    {!! Form::text('tgl_selesai', null, ['class' => 'form-control','id'=>'tgl_selesai']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#tgl_selesai').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Approval Field -->
<div class="form-group col-sm-6">
    {!! Form::label('approval', 'Approval:') !!}
    {!! Form::text('approval', null, ['class' => 'form-control']) !!}
</div>

<!-- Jen Keg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jen_keg', 'Jenis Kegiatan:') !!}
    {{ Form::select('jen_keg', $jen_kegItems, null, ['class' => 'form-control']) }}

</div>

<!-- Pagu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pagu', 'Pagu:') !!}
    {!! Form::text('pagu', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Target Field -->
<div class="form-group col-sm-6">
    {!! Form::label('target', 'Target:') !!}
    {!! Form::text('target', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Volume Field -->
<div class="form-group col-sm-6">
    {!! Form::label('volume', 'Volume:') !!}
    {!! Form::text('volume', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('kegiatans.index') }}" class="btn btn-default">Cancel</a>
</div>
