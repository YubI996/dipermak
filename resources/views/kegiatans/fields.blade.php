@livewireScripts
@livewireStyles
<!-- Nama Keg Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('nama_keg', 'Nama Keg:') !!}
    {!! Form::textarea('nama_keg', null, ['class' => 'form-control']) !!}
</div>

@livewire('admin.dashboard')

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
        });
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
        });
        </script>
@endpush

<!-- Approval Field -->
<div class="form-group col-sm-6">
    {!! Form::label('approval', 'Approval:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('approval', 0) !!}
        {!! Form::checkbox('approval', '1', null) !!}
    </label>
</div>


<!-- Jen Keg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jen_keg', 'Jen Keg:') !!}
    {!! Form::select('jen_keg', $jen_kegItems, Request::old('jenKeg_id'), ['class' => 'form-control']) !!}
</div>


<!-- Volume Field -->
<div class="form-group col-sm-6">
    {!! Form::label('volume', 'Volume:') !!}
    <div class="input-group-prepend">
        <div class="input-group-text">Rp</div>
      </div>
      <input class="form-control" maxlength="255" id="inlineFormInputGroup" name="volume" type="text">
    {{-- {!! Form::text('volume', null, ['class' => 'form-control','maxlength' => 255,'id'=>'inlineFormInputGroup']) !!} --}}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('kegiatans.index') }}" class="btn btn-default">Cancel</a>
</div>
@push('scripts')
    <script >

    </script>
@endpush
