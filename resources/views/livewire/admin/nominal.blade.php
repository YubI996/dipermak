<div>
    <div class="form-group row">
        <div class="col-2">

            {!! Form::label('keg_id', 'Kegiatan :') !!}
        </div>
        <div class="col-10">

            {!! Form::select('keg_id', $kegItems, Request::old('kegiatan_id'), ['class' => 'form-control','placeholder' => 'Pilih Kegiatan', 'wire:model.lazy' => 'kid']) !!}
        </div>
    </div>
        {!! Form::hidden('rt_id', $rtid) !!}
    <!-- Target Field -->
    <div class="form-group row">
        <div class="col-2">

            {!! Form::label('target', 'Target :') !!}
        </div>

        <div class="input-group col-10">
            <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
            {!! Form::number('target',null, ['id' => 'target','class' => 'form-control','maxlength' => 20, 'wire:model.lazy' => 'target', 'disabled']) !!}
               
        </div>
    </div>
    <div class="form-group row">
        <!-- Nominal Field -->
                <div class="col-2">

                    {!! Form::label('nominal', 'Nominal :') !!}
                </div>
                <div class="input-group col-10">

                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
                    {{-- {!! Form::number('nominal', null, ['class' => 'form-control','maxlength' => 3, 'wire:model' => 'nom','wire:change' => 'setPer','step'=>'any']) !!} --}}
                    {!! Form::number('nominal', null,['id' => 'nom','class' => 'form-control col-6','maxlength' => 20, 'wire:model' => 'nom']) !!}
                </div>
    </div>
    <div class="form-group row">
        <!-- Persentase Field -->
        <div class="col-2">
            
            {!! Form::label('persentase', 'Persentase :') !!}
        </div>
        <div class="col-10">
            
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
