<div>
    {{-- @php
        dump($target);
        dump($nom);
        dump($per);
        dump($tgl);
    @endphp --}}
        <!-- Keg Id Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('keg_id', 'Keg Id:') !!}
        {!! Form::select('keg_id', $kegItems, Request::old('kegiatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kegiatan', 'wire:model' => 'kid']) !!}
    </div>

    <!-- Rt Id Field -->
    {{-- <div class="form-group col-sm-6"> --}}
        {{-- {!! Form::label('rt_id', 'Rt Id:') !!} --}}

        {!! Form::hidden('rt_id', Auth::user()->rt_id) !!}
    {{-- </div> --}}
    <!-- Target Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('target', 'Target:') !!}
        {!! Form::text('target', $target, ['id' => 'num','class' => 'form-control','maxlength' => 3, 'wire:model' => 'target']) !!}
    </div>
  
    <!-- Nominal Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('nominal', 'Nominal:') !!}
        {{-- {!! Form::number('nominal', null, ['class' => 'form-control','maxlength' => 3, 'wire:model' => 'nom','wire:change' => 'setPer','step'=>'any']) !!} --}}
        {!! Form::text('nominal', null, ['id' => 'num','class' => 'form-control','maxlength' => 20, 'wire:model.delay.750ms' => 'nom']) !!}
    </div>
    
    <!-- Persentase Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('nominal', 'Persentase :') !!}
        {{-- {!! Form::number('per', null, ['class' => 'form-control','max' => 100, 'wire:model' => 'per','wire:change' => 'setNom','step'=>'any']) !!} --}}
        {!! Form::text('per', null, ['id' => 'num','class' => 'form-control','maxlength' => 3, 'wire:model.delay.750ms' => 'per']) !!}
    </div>
</div>
