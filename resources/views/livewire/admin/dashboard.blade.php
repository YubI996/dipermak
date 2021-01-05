<div>
    <div>
     
<!-- Jen Keg Field -->


<!-- Pagu Field -->
{{-- <div class="input-group"> --}}

    {!! Form::label('pagu', 'Pagu :     ') !!}
    <div class="input-group-prepend">
        <div class="input-group-text">Rp</div>
      </div>
    {!! Form::number('pagu', null, ['class' => 'form-control','maxlength' => 255,'wire:model' => 'pagu']) !!}

<!-- Target Field -->

    {!! Form::label('target', 'Target:') !!}
    Rp
    {!! Form::number(null, null, ['class' => 'form-control','maxlength' => 3,'placeholder' => 'Persentase','wire:model' => 'per']) !!}
    {!! Form::number('target', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Nominal','wire:model' => 'nom']) !!}
{{-- </div> --}}
    </div>
</div>
