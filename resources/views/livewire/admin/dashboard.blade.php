<div>
    <div>
     
<!-- Jen Keg Field -->


<!-- Pagu Field -->
{{-- <div class="input-group"> --}}
    <div class="row mb-3">
        <div class="col-1">
            {!! Form::label('pagu', 'Pagu :     ') !!}
        </div>
        <div class="col-11">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
                    {!! Form::number('pagu', null, ['class' => 'form-control','maxlength' => 255,'wire:model' => 'pagu']) !!}
                </div>
            </div>
    </div>

<!-- Target Field -->

<div class="row mb-3">
    <div class="col-1">
        {!! Form::label('target', 'Target:') !!}
    </div>
    <div class="col-3">
            <div class="input-group">
                {!! Form::number(null, null, ['class' => 'form-control','maxlength' => 3,'placeholder' => 'Persentase','wire:model' => 'per']) !!}
                <div class="input-group-prepend">
                    <div class="input-group-text">%</div>
                </div>
            </div>{{-- input group --}}
        </div>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Rp</div>
                </div>
                {!! Form::number('target', null, ['class' => 'form-control','maxlength' => 255,'placeholder' => 'Nominal','wire:model' => 'nom']) !!}
            </div>{{-- input group --}}
    </div>
</div>
{{-- </div> --}}
    </div>
</div>
