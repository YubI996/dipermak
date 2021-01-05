{{-- id --}}
@if (isset($kegiatan))
{{-- {{ Form::hidden('id', $kegiatan->id),['wire:model' => 'kid'] }} --}}
<input  type="hidden" value="{{$kegiatan->id}}" wire:model ="kid">
@endif
<!-- Nama Keg Field -->
{{-- <div class="form-group"> --}}
    {!! Form::label('nama_keg', 'Nama Keg:') !!}
    {!! Form::textarea('nama_keg', null, ['class' => 'form-control']) !!}
{{-- </div>  --}}
@livewire('admin.pilihrt')
{{-- @livewire('pilihrt', ['user' => $user], key($user->id)) --}}
@if (isset($kegiatan))
@livewire('admin.dashboard',['kid'=>$kegiatan->id])
@else

@livewire('admin.dashboard',['kid'=>0])
@endif

<!-- Tgl Mulai Field -->
{{-- <div class="form-group"> --}}
    {!! Form::label('tgl_mulai', 'Tgl Mulai:') !!}
    {!! Form::text('tgl_mulai', null, ['class' => 'form-control','id'=>'tgl_mulai']) !!}
{{-- </div> --}}

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
{{-- <div class="form-group"> --}}
    {!! Form::label('tgl_selesai', 'Tgl Selesai:') !!}
    {!! Form::text('tgl_selesai', null, ['class' => 'form-control','id'=>'tgl_selesai']) !!}
{{-- </div> --}}

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
{{-- <div class="form-group"> --}}
    {!! Form::label('approval', 'Approval:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('approval', 0) !!}
        {!! Form::checkbox('approval', '1', null) !!}
    </label>
{{-- </div> --}}


<!-- Jen Keg Field -->
{{-- <div class="form-group"> --}}
    {!! Form::label('jen_keg', 'Jen Keg:') !!}
    {!! Form::select('jen_keg', $jen_kegItems, Request::old('jenKeg_id'), ['class' => 'form-control']) !!}
{{-- </div> --}}


<!-- Volume Field -->
{{-- <div class="input-group"> --}}
{{-- <div class="form-group col-sm-6"> --}}
    {!! Form::label('volume', 'Volume:') !!}
    {{-- <input class="form-control" maxlength="255" id="inlineFormInputGroup" id="volume" name="volume" type="text"> --}}
    {!! Form::text('volume', null, ['class' => 'form-control','maxlength' => 255]) !!}
        <div class="input-group-prepend">
            <div class="input-group-text">Satuan</div>
          </div>
{{-- </div> --}}
{{-- </div> --}}

<!-- Submit Field -->
{{-- <div class="form-group"> --}}
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('kegiatans.index') }}" class="btn btn-default">Cancel</a>
{{-- </div> --}}
@push('scripts')
    <script >

    </script>
@endpush
