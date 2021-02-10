<div>
    @php
        dump($target);
        dump($nom);
        dump($per);
        dump($tgl);
    @endphp
        <!-- Keg Id Field -->


    <!-- Rt Id Field -->
    {{-- <div class="form-group col-sm-6"> --}}
        {{-- {!! Form::label('rt_id', 'Rt Id:') !!} --}}

        {!! Form::hidden('rt_id', Auth::user()->rt_id) !!}
    {{-- </div> --}}
    <!-- Target Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('target', 'Target:') !!}
        {!! Form::text('target', $target, ['id' => 'target','class' => 'form-control','maxlength' => 20, 'wire:model' => 'target']) !!}
    </div>
  <div class="row">
      <!-- Nominal Field -->
      <div class="form-group col-6">
          {!! Form::label('nominal', 'Nominal:') !!}
          {{-- {!! Form::number('nominal', null, ['class' => 'form-control','maxlength' => 3, 'wire:model' => 'nom','wire:change' => 'setPer','step'=>'any']) !!} --}}
          {!! Form::text('nominal', null, $nom,['id' => 'nom','class' => 'form-control col-6','maxlength' => 20, 'wire:model.lazy' => 'nom']) !!}
      </div>
      
      <!-- Persentase Field -->
      <div class="form-group col-6">
          {!! Form::label('persentase', 'Persentase :') !!}
          {{-- {!! Form::number('per', null, ['class' => 'form-control','max' => 100, 'wire:model' => 'per','wire:change' => 'setNom','step'=>'any']) !!} --}}
          {!! Form::text(null, null,$per, ['id' => 'per','class' => 'form-control col-6','maxlength' => 3, 'wire:model.lazy' => 'per']) !!}
      </div>
  </div>
</div>
