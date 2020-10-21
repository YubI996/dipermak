<!-- Jenis Keg Field -->
<div class="form-group">
    {!! Form::label('jenis_keg', 'Jenis Keg:') !!}
    <p>{{ $jenKeg->jenis_keg }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $jenKeg->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $jenKeg->updated_at }}</p>
</div>

