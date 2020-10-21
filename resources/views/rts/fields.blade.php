<!-- Nama Rt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_rt', 'Nama Rt:') !!}
    {!! Form::text('nama_rt', null, ['class' => 'form-control','maxlength' => 20]) !!}
</div>

<!-- Kel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kel_id', 'Kel Id:') !!}
    {!! Form::select('kel_id', $kelurahanItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('rts.index') }}" class="btn btn-default">Cancel</a>
</div>
