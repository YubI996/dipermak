<!-- Keg Id Field -->
<div class="form-group">
    {!! Form::label('keg_id', 'Keg Id:') !!}
    <p>{{ $dokumentasi->keg_id }}</p>
</div>

<!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', 'Foto:') !!}
    <p>{{ $dokumentasi->foto }}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $dokumentasi->keterangan }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $dokumentasi->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $dokumentasi->updated_at }}</p>
</div>

