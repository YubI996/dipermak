<div>
    <div class="form-group row">
    {!! Form::label('keg_id', 'Kegiatan :') !!}
    {!! Form::select('keg_id', $kegItems, Request::old('kegiatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kegiatan', 'wire:model.lazy' => 'kid']) !!}
</div>
        {!! Form::hidden('rt_id', Auth::user()->rt_id) !!}
    {{-- </div> --}}
    <!-- Target Field -->
    <div class="form-group row">
        {!! Form::label('target', 'Target :') !!}
        <div class="input-group">
            <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
            {!! Form::text('target',null, ['id' => 'target','class' => 'form-control','maxlength' => 20, 'wire:model.lazy' => 'target']) !!}
               
        </div>
    </div>
  <div class="row">
      <!-- Nominal Field -->
      <div class="form-group col-6">
          {!! Form::label('nominal', 'Nominal :') !!}
          <div class="input-group">

            <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
            </div>
                {{-- {!! Form::number('nominal', null, ['class' => 'form-control','maxlength' => 3, 'wire:model' => 'nom','wire:change' => 'setPer','step'=>'any']) !!} --}}
                {!! Form::text('nominal', null,['id' => 'nom','class' => 'form-control col-6','maxlength' => 20, 'wire:model' => 'nom']) !!}
        </div>
      </div>
      
      <!-- Persentase Field -->
      <div class="form-group col-6">
          {!! Form::label('persentase', 'Persentase :') !!}
          {{-- {!! Form::number('per', null, ['class' => 'form-control','max' => 100, 'wire:model' => 'per','wire:change' => 'setNom','step'=>'any']) !!} --}}
          <div class="input-group">
            {!! Form::text(null, null, ['id' => 'per','class' => 'form-control col-6','maxlength' => 3, 'wire:model' => 'per']) !!}
                <div class="input-group-prepend">
                    <div class="input-group-text">%</div>
                </div>
        </div>
      </div>
  </div>
</div>
