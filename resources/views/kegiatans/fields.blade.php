{{-- id --}}
@if (isset($kegiatan))
{{-- {{ Form::hidden('id', $kegiatan->id),['wire:model' => 'kid'] }} --}}
<input  type="hidden" value="{{$kegiatan->id}}" wire:model ="kid">
    @livewire('admin.pilihrt',['rtid'=>$kegiatan->rt_id])

@else
    @livewire('admin.pilihrt')

@endif
<!-- Nama Keg Field -->
{{-- <div class="form-group"> --}}
    <div class="row">
        <div class="col-1">
            {!! Form::label('nama_keg', 'Nama Kegiatan :') !!}
        </div>
        <div class="col-11">
            {!! Form::textarea('nama_keg', null, ['class' => 'form-control mb-3']) !!}
        </div>
    </div>
    
    
    {{-- @livewire('pilihrt', ['user' => $user], key($user->id)) --}}
    @if (isset($kegiatan))
    @livewire('admin.dashboard',['kid'=>$kegiatan->id])
    @else
    @livewire('admin.dashboard',['kid'=>0])
    @endif
    
    <!-- Tgl Mulai Field -->
    {{-- <div class="form-group"> --}}
    <div class="row">
        <div class="col-1">
            {!! Form::label('tgl_mulai', 'Tanggal Mulai:') !!}
        </div>
        <div class="col-11">
            {{-- {!! Form::text('tgl_mulai', null, ['class' => 'form-control datetimepicker-input mb-3','id'=>'tgl_mulai', 'data-target'= '#reservationdate']) !!} --}}
            <div class="input-group date mb-3" id="tgl_mulai" data-target-input="nearest">
                <div class="input-group-append" data-target="#tgl_mulai" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                @if (isset($kegiatan))
                <input type="text" value="{{$kegiatan->tgl_mulai}}" class="form-control datetimepicker-input" name="tgl_mulai" data-target="#tgl_mulai"/>
                @else
                <input type="text" class="form-control datetimepicker-input" name="tgl_mulai" data-target="#tgl_mulai"/>
                @endif
            </div>
        </div>
    </div>
    {{-- </div> --}}

        <div class="row mb-3">
            <div class="col-1">
                {!! Form::label('sumber_dana', 'Sumber dana :') !!}
            </div>
            <div class="col-11 m-auto">
                {!! Form::select('sumber_dana', ['APBN','APBD'], Request::old('sumber_dana'), ['class' => 'form-control','placeholder' => 'Sumber Dana']) !!}
                {{-- {!! Form::select(null, $kecamatanItems, Request::old('kecamatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kecamatan','wire:model.lazy' => 'kec']) !!} --}}
            </div>
        </div> 

<!-- Tgl Selesai Field -->
{{-- <div class="form-group"> --}}
    <div class="row">
        <div class="col-1">
            {!! Form::label('tgl_selesai', 'Tanggal Selesai:') !!}
        </div>
        <div class="col-11">
            {{-- {!! Form::text('tgl_selesai', null,['class' => 'form-control form-control datetimepicker-input mb-3']) !!} --}}
            <div class="input-group date mb-3" id="tgl_selesai" data-target-input="nearest">
                <div class="input-group-append" data-target="#tgl_selesai" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                {{-- <input type="text" class="form-control datetimepicker-input" name="tgl_selesai" data-target="#tgl_sel"/> --}}
                @if (isset($kegiatan))
                <input type="text" value="{{$kegiatan->tgl_selesai}}" class="form-control datetimepicker-input" name="tgl_selesai" data-target="#tgl_selesai"/>
                @else
                <input type="text" class="form-control datetimepicker-input" name="tgl_selesai" data-target="#tgl_selesai"/>
                @endif
            </div>
        </div>
    </div>
            {{-- </div> --}}

<!-- Approval Field -->
{{-- <div class="form-group"> --}}
    <div class="row">
        <div class="col-1">

            {!! Form::label('approval', 'Approval:') !!}
        </div>
        <div class="col-11 icheck-success mb-3">

            <label class="checkbox-inline">
                {!! Form::checkbox('approval', '1', 'checked') !!}
            </label>
        </div>
    </div>
{{-- </div> --}}


<!-- Jen Keg Field -->
{{-- <div class="form-group"> --}}
    <div class="row">
        <div class="col-1">

            {!! Form::label('jen_keg', 'Jenis Keg:') !!}
        </div>
        <div class="col-11">
            {!! Form::select('jen_keg', $jen_kegItems, Request::old('jenKeg_id'), ['class' => 'form-control mb-3']) !!}
        </div>
    </div>
{{-- </div> --}}


<!-- Volume Field -->
{{-- <div class="form-group col-sm-6"> --}}
    <div class="row">
        <div class="col-1">
            {!! Form::label('volume', 'Volume:') !!}
        </div>
        {{-- <input class="form-control" maxlength="255" id="inlineFormInputGroup" id="volume" name="volume" type="text"> --}}
        <div class="col-5 mb-3">
                {!! Form::text('volume', null, ['class' => 'form-control','maxlength' => 255]) !!}
        </div>
        <div class="col-1">
            {!! Form::label('satuan', 'Satuan :') !!}
        </div>
        <div class="col-5 mb-3">
                {!! Form::text('satuan', null, ['class' => 'form-control']) !!}
        </div>
    </div>
{{-- </div> --}}




<!-- Submit Field -->
{{-- <div class="form-group"> --}}
    {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}
    <div class="d-flex justify-content-center mb-3">
        <div class="d-flex">
            
            {{ Form::button('<i class="fas fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-app bg-success'] )  }}
        </div>
        
        <div class="d-flex">
            <a href="{{ route('kegiatans.index') }}" class="btn btn-app bg-warning"><i class="fas fa-window-close"></i>Cancel</a>
        </div>
    </div>
{{-- </div> --}}


