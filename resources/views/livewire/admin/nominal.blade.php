<div>
    <div class="form-group row">
    {!! Form::label('keg_id', 'Kegiatan') !!}
    : {!! Form::select('keg_id', $kegItems, Request::old('kegiatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kegiatan', 'wire:model.lazy' => 'pid']) !!}
</div>
        {!! Form::hidden('rt_id', Auth::user()->rt_id) !!}
    {{-- </div> --}}
    <!-- Target Field -->
    <div class="form-group row">
        {!! Form::label('target', 'Target') !!}
        : {!! Form::text('target', number_format($target,0,',','.'), ['id' => 'target','class' => 'form-control','maxlength' => 20, 'wire:model.lazy' => 'target']) !!}
    </div>
  <div class="row">
      <!-- Nominal Field -->
      <div class="form-group col-6">
          {!! Form::label('nominal', 'Nominal') !!}
          {{-- {!! Form::number('nominal', null, ['class' => 'form-control','maxlength' => 3, 'wire:model' => 'nom','wire:change' => 'setPer','step'=>'any']) !!} --}}
          : {!! Form::text('nominal', null,null,['id' => 'nom','class' => 'form-control col-6','maxlength' => 20, 'wire:model.lazy' => 'nom']) !!}
      </div>
      
      <!-- Persentase Field -->
      <div class="form-group col-6">
          {!! Form::label('persentase', 'Persentase ') !!}
          {{-- {!! Form::number('per', null, ['class' => 'form-control','max' => 100, 'wire:model' => 'per','wire:change' => 'setNom','step'=>'any']) !!} --}}
          : {!! Form::text(null, null,null, ['id' => 'per','class' => 'form-control col-6','maxlength' => 3, 'wire:model.lazy' => 'per']) !!}
      </div>
  </div>
</div>
